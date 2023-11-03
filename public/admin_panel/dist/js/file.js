class FileHelper {
    static create = {
        image: function (path) {
            return `<img src='${path}' alt='...'>`
        }
    }

    static delete(button) {
        $(button).prev().get(0).checked = true;
        $(button).parent().hide();
    }
}

$(function () {
    let path = "/storage/uploads/";
    const href = window.location.href;
    let link = href.substring(href.indexOf('admin/') + 'admin/'.length);
    link = link.substring(0, link.indexOf('/') + 1)
    path += link;

    $(".file-label").map(function () {
        let content = $(this).find('input').attr('value');
        const input = $(this).find("input[type='file']");

        if(content) {
            content.includes('[') ? content = JSON.parse(content) : '';
            typeof content == 'string' ? content = content.split() : ''; 
            const list = document.createElement('div');
            $(list).addClass('file-list');

            for (const item of content) {
                const element = FileHelper.create.image(path + item);
                const checkbox = `<input type="checkbox" name="delete_image" value="${item}," class="file-checkbox">`
                const button = `<button type='button' class='file-delete'>X</button>`;
                $(list).append("<div class='file-container'>" + element + (input.data('delete') != false ? (checkbox + button) : '') + "</div>");
            }

            $(this).parent().append(list);
        }
    });

    $('.file-delete').on('click', function () {
        FileHelper.delete(this);
    });
});

$('.file-label input').on('change', function () {
    $(this).parent().parent().find('.file-list').remove();
    if(this.files) {
        $(this).parent().parent().find('.file-list').remove();
        const list = document.createElement('div');
        $(list).addClass('file-list');

        for (const file of this.files) {
            const blob = new Blob([file], { type: file.type });
            const url = URL.createObjectURL(blob);
            const preview = FileHelper.create.image(url);
            const name = "<div class='file-name'>" + file.name + "</div>";
            $(list).prepend("<div class='file-container'>" + name + preview + "</div>");
        }
        $(this).parent().parent().append(list);
    }
});	
