
function Realtime(url,type,id)
{
    socket.on("chats_"+type+"_"+id, (arg, callback) => {
        $('.chats_list .chat_'+arg.chat_id).remove()
        $.playSound('../dist/notification')
        ChatCard(url,arg)
    }); 
}


function Like_Dislike(auth,url,post_id,type)
{
    if(auth == '1')
    $.get(url+"/socity/like-dislike/"+post_id+"/"+type
    ,function(data, status){
        if(type === 'like')
        {
            if(data.data.class === '1')
            {
                $('#like_post'+post_id).addClass('active')
                $('#dislike_post'+post_id).removeClass('active')
            }else if(data.data.class === '0')
            {
                $('#like_post'+post_id).removeClass('active')
            }
            $('#like_count'+post_id).text(data.data.count)
        }else if(type === 'dislike')
        {
            if(data.data.class === '1')
            {
                $('#dislike_post'+post_id).addClass('active')
                $('#like_post'+post_id).removeClass('active')
            }else if(data.data.class === '0')
            {
                $('#dislike_post'+post_id).removeClass('active')
            }
            $('#dislike_count'+post_id).text(data.data.count)
        }
    });
}

function Share(url,post_id)
{
    $.get(url+"/socity/share/"+post_id
    ,function(data, status){
        if(data.status === '1')
        {
            if(data.data.class === '1')
            {
                $('#share_post'+post_id).addClass('active')
            }else if(data.data.class === '0')
            {
                $('#share_post'+post_id).removeClass('active')
            }
            $('#share_count'+post_id).text(data.data.count)
        }
    });
}

function Comment(url,post_id,subject)
{
    if(subject === '' || subject == null || subject == undefined)
    {
        alert('يجب إدخال تعليق')
    }else{
        $.get(url+"/socity/comment/"+post_id+"/"+subject
        ,function(data, status){
            if(data.status === '1')
            {
                $('.replies-box').prepend(`
                    
                    <div class="d-flex single_replay">
                    <div class="img_user">
                        <img src="${data.data.data.userable.avatar_url}" width="" height=""
                            alt="">
                    </div>

                    <div class="post_info">
                        <h4 class="flex-column align-items-start">
                            <span>
                                
                                ${ data.data.data.userable.name }
                                <small>
                                    ${ data.data.data.date }
                                </small>
                            </span>
                        </h4>
                        <p>
                            ${ data.data.data.subject }
                        </p>
                        <ul class="list_actions">
                            <li id="rep_like${data.data.data.id}" onclick="CommentAction('${url}','${data.data.data.id}','like')">
                                <button type="button">
                                    <i class="far fa-arrow-alt-up"></i>
                                    <span id="rep_like_count${data.data.data.id}">
                                        0
                                    </span>
                                </button>
                            </li>
                            <li id="rep_dislike${data.data.data.id}" onclick="CommentAction('${url}','${data.data.data.id}','dislike')">
                                <button type="button">
                                    <i class="far fa-arrow-alt-down"></i>
                                    <span id="rep_dislike_count${data.data.data.id}">
                                        0
                                    </span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                `)
                $('.subject').val(' ')
            }
        });
    }
}
$(document).on('click','.post_details',function(){
    var url = $(this).data('url')
    window.location.href = url;
})

function CommentAction(url,reply_id,type)
{
    $.get(url+"/socity/comment-actions/"+reply_id+"/"+type
    ,function(data, status){
        if(data.status === '1')
        {
            if(data.data.data.like === '1')
            {
                $('#rep_like'+reply_id).addClass('active')
            }else
            {
                $('#rep_like'+reply_id).removeClass('active')
            }

            if(data.data.data.dislike === '1')
            {
                $('#rep_dislike'+reply_id).addClass('active')
            }else
            {
                $('#rep_dislike'+reply_id).removeClass('active')
            }
            $('#rep_like_count'+reply_id).text(data.data.like_count)
            $('#rep_dislike_count'+reply_id).text(data.data.dislike_count)

        }
    });
}

function Trademark(url,post_id)
{
    $.get(url+"/socity/trademark-action/"+post_id
    ,function(data, status){
        if(data.data.data === '0')
        {
            $('.trademark'+post_id).text('حفظ علامة مرجعية')
        }else{
            $('.trademark'+post_id).text('إلغاء علامة مرجعية')
        }
    })
}

function Search(auth,url,search = null)
{
    $.get(url+"/socity/search/"+search
    ,function(data, status){
        $('.posts_community').html('')
        $.each(data.data.data,(k,v)=>{
            PostCard(url,auth,v)
        })
    })
}

function CopyLink(url)
{
    navigator.clipboard.writeText(url);
}

function OpenChat(url,auth,user_id,user_type,my_id,my_type)
{
    if(auth === '1')
    {
        $.get(url+"/socity/get-chat/"+user_id+"/"+user_type
        ,function(data, status){
            if(data.status === '1')
            {
                $(".chat_details").addClass("show_chat_details");
                $('.conversation ul').html('')

                $('#chat_id').val(data.data.chat.id)
                $('#user_id').val(user_id)
                $('#user_type').val(user_type)

                $('.receve_name').text(data.data.chat.chats_data['name'])
                $.each(data.data.messages,(k,v)=>{
                    ShowMessage(v.i_send,v.message,v.date)
                })

                socket.removeAllListeners("chat_"+data.data.chat.id);
                socket.on("chat_"+data.data.chat.id, (arg, callback) => {
                    if(arg.my_id == my_id && arg.my_type == my_type)
                    {
                        var is_send = '1'
                    }else{
                        var is_send = '0'
                    }
                    ShowMessage(is_send,arg.message,moment().format('LT'))
                });
            }
        })
    }

}

function SendMessage(url,auth,message,my_id,my_type,my_avatar,my_name)
{
    if(auth === '1')
    {
        var chat_id = $('#chat_id').val()
        var user_id = $('#user_id').val()
        var user_type = $('#user_type').val()
        $.get(url+"/socity/send-message/"+chat_id+"/"+message
        ,function(data, status){
            if(data.status === '1')
            {
                var collect = {
                    'message': data.data.message.message,
                    'chat_id':chat_id,
                    'my_id':my_id,
                    'my_type':my_type,
                    'my_avatar':my_avatar,
                    'user_id':user_id,
                    'user_type':user_type,
                    'my_name':my_name,
                }
                socket.emit("send_message",collect, (response) => {
                    
                });
                $('#text-message').val('')
                $('.send_message').fadeOut();

            }
        })
    }

}

function ShowMessage(i_send,message,date)
{
    const el = document.querySelector(".body_chat .conversation ");
    $('.conversation ul').append(`
        <li class="${i_send === '1' ? 'receiver' : ''}">
            <div class="item">
                ${message}
                <small> ${date}</small>
            </div>
        </li>
    `)
    el.scrollTop = el.scrollHeight;

}

$(document).on('click','.load_more_posts', function() {
    var page_url = $(this).attr('data-url')
    var url      = $(this).attr('data-root_url')
    var auth     = $(this).attr('data-auth')
    
    $('.spiner').show()
    $('.load_more_posts').hide()

    $.get(page_url
    ,function(data, status){
        var posts    = data.data.data.data
        var next_url = data.data.data.next_page_url
        var to       = data.data.data.to
        var total    = data.data.data.total
        if(to < total)
        {
            $('.spiner').hide()
            $('.load_more_posts').show()

            $('.load_more_posts').attr('data-url',next_url)
            $.each(posts,(k,v)=>{
                PostCard(url,auth,v)
            })
        }else{
            $('.load_more_posts').hide()
            $('.spiner').hide()
        }
    })
});

function PostCard(url,auth,v)
{
    $('.posts_community').append(`
        <div class="card_post  mb-3">

        <div class="img_user" onclick="OpenChat('${url}','${auth}','${v.userable_id}','${v.userable_type}')">
            <img src="${v.userable.avatar_url}" width="" height="" alt="">
        </div>

        <div class="post_info">
            <h4>
                <span onclick="OpenChat('${url}','${auth}','${v.userable_id}','${v.userable_type}')" >${v.userable.name}</span>
                <a href="#">

                </a>
                <div class="dropdown">
                    <button type="button" id="drop_post" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="drop_post">
                
                        ${auth == '1' ?
                        `
                        <li><a class="dropdown-item trademark trademark${v.id}" onclick="Trademark('${url}','${v.id}')" href="#">
                            ${v.is_trademark == '1' ?' إلغاء علامة مرجعية':'حفظ علامة مرجعية'}
                        </a></li>`
                        : '' }
            
                    <li><a class="dropdown-item" href="#">نسخ الرابط </a></li>
                </ul>
                </div>
            </h4>
            <p class="post_details" data-url="${url}/socity/post/${v.id}">${str_limit(v.subject,200)}</p>
            <ul class="list_actions">
                <li class="${ v.is_like === '1' ? 'active' : '' }" id="like_post${v.id}" onclick="Like_Dislike('${auth}','${url}','${v.id}','like')">
                    <button type="button" >
                        <i class="far fa-arrow-alt-up"></i>
                        <span id="like_count${v.id}">${v.post_likes.length}</span>
                    </button>
                </li>
                <li class="${ v.is_dislike === '1' ? 'active' : '' }" id="dislike_post${v.id}" onclick="Like_Dislike('${auth}','${url}','${v.id}','dislike')">
                    <button type="button">
                        <i class="far fa-arrow-alt-down"></i>
                        <span id="dislike_count${v.id}">${v.post_dlikes.length}</span>
                    </button>
                </li>
                <li>
                    <button type="button" class="post_details" data-url="${url}/socity/post/${v.id}">
                        <i class="far fa-comment-alt-lines"></i>
                        ${v.post_reps.length}
                    </button>
                </li>
                <li class="" id="share_post${v.id}" onclick="Share(${url},${v.id}">
                    <button type="button">
                        <i class="far fa-share-alt"></i>
                        <span id="share_count${v.id}">${v.share}</span>
                    </button>
                </li>
            </ul>
        </div>

        </div>
    `)
}

function ChatCard(url,arg)
{
    $('.chats_list').prepend(`
        <li class="chat_${arg.chat_id}" onclick="OpenChat('${url}','1','${arg.my_id}','${arg.my_type}','${arg.user_id}','${arg.user_type}')">
            <a href="javascript:;" id="chat_1">
                <div class="img_user">
                    <img src="${arg.my_avatar}" alt="">
                </div>
                <div class="text_user">
                    <h4>
                        ${arg.my_name}
                        <i class="fal fa-ellipsis-h-alt"></i>
                    </h4>
                    <p class="text-danger">
                        ${arg.message}
                    </p>
                </div>
            </a>
        </li>
    `)
}

$('#text-message').on('keyup',function(){
    var length = $(this).val().length;
    if(length > 0)
    {
        $('.send_message').fadeIn();
    }else{
        $('.send_message').fadeOut();
    }
})

$('#chat__form').on('submit',function(e){
    e.preventDefault();
    $('.send_message').click();
})

$('.back_chat').on('click',function(){
    CloseChatsListing()
})

function CloseChatsListing()
{
    var arr = []
    var chats = $('.chat_list').get()
    $.each(chats,(k,v)=>{
        arr.push(v.classList[1]) 
        socket.removeAllListeners(v.classList[1]);
    })
}
CloseChatsListing()
