$(function(){
    var wrapper = $( ".file_upload" ),
        inp = wrapper.find( "input" ),
        btn = wrapper.find( "button" ),
        lbl = wrapper.find( "div" );

    // Crutches for the :focus style:
    btn.focus(function(){
        wrapper.addClass( "focus" );
    }).blur(function(){
        wrapper.removeClass( "focus" );
    });

    // Yep, it works!
    btn.add( lbl ).click(function(){
        inp.click();
    });

    var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

    inp.change(function(){
        var file_name;
        if( file_api && inp[ 0 ].files[ 0 ] )
            file_name = inp[ 0 ].files[ 0 ].name;
        else
            file_name = inp.val().replace( "C:\\fakepath\\", '' );
        if( ! file_name.length )
            return;

        if( lbl.is( ":visible" ) ){
            lbl.text( file_name );
            btn.text( "Выбрать" );
        }else
            btn.text( file_name );
    }).change();

});
$( window ).resize(function(){
    $( ".file_upload input" ).triggerHandler( "change" );
});

$(function() {
    var txt = $('#comments'),
    hiddenDiv = $(document.createElement('div')),
    content = null;

    txt.addClass('noscroll');
    hiddenDiv.addClass('hiddendiv');

    $('body').append(hiddenDiv);

    txt.bind('keyup', function() {

        content = txt.val();
        content = content.replace(/\n/g, '<br>');
        hiddenDiv.html(content);

        txt.css('height', hiddenDiv.height());

    });
});


$(document).ready(function() {
    jQuery(function() {
        jQuery('textarea').autoResize({
        });
    });
});

$(document).ready(function() {
    $(".photoimg").on('change', function(e) {
        var b = new Array(), key_b, name_b;
        var A=$("#imageloadstatus");
        var B=$("#imageloadbutton");

        $(".photoimg").each(function(i) {
            b.push($(this));
            if (this == e.target) {
                key_b = i;
            }
        })
        id = $(b[key_b]).attr("id");
            $(b[key_b]).parent().parent().ajaxForm({target: '#'+id,
            beforeSubmit:function(){
                A.show();
                B.hide();
            },
            success:function(){
                A.hide();
                B.show();
            },
            error:function(){
                A.hide();
                B.show();
            }
            }).submit();
    })
});