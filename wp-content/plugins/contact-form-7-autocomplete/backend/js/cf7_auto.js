jQuery(document).ready(function($){
    var add_html = '<tr><th scope="row"><label for="tag-generator-panel-text-class">Auto Сomplete</label></th>';
        add_html += '<td><select class="cf7-auto-choose" data-prev="0">';
        add_html += '<option value="0">Nothing</option>';
        add_html += '<option value="address">Address</option>';
        add_html += '<option value="address_full">Address Full</option>';
        add_html += '<option value="users">Users</option>';
        add_html += '<option value="post">Posts</option>';
        add_html += '<option value="page">Pages</option>';
        $.each(cf7_auto, function(key, value){
            add_html += '<option value="'+key+'"> '+value+' (Post Type)</option>';
        })
        add_html += '</select></td>/tr>';

    $(".tag-generator-panel[data-id='text'] .form-table").append(add_html);
    $("body").on("change",".cf7-auto-choose",function(e){
        var prev = $(this).data("prev");
        var id = $(this).val();
        var code = $(this).closest(".tag-generator-panel").find(".code").val();
        if( id == 0 ) {
            code = code.replace(" add_autocomplete:"+prev+"]","]");
        }else{
            if( code.search("add_autocomplete") > 0 ) {
              code = code.replace("add_autocomplete:"+prev+"]","add_autocomplete:"+id+"]");
            }else{
               code = code.replace("]"," add_autocomplete:"+id+"]");
            }
        }
        $(this).closest(".tag-generator-panel").find(".code").val(code);
        $(this).data("prev",id );
    })
})