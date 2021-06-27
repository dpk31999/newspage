$_DOMAIN = 'http://localhost/newspage/admin/';

function ChangeToSlug() {
    var title, slug;
    title = $('.title').val();
    slug = title.toLowerCase();

    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    $('.slug').val(slug);
}

$('.slug').on('click', function() {
    ChangeToSlug();
});

$('.list input[type="checkbox"]:eq(0)').change(function() {
    $('.list input[type="checkbox"]').prop('checked', $(this).prop("checked"));
});

// Xoá nhiều chuyên mục cùng lúc
$('#del_cate_list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá các chuyên mục đã chọn không?');
    if ($confirm == true) {
        $id_cate = [];

        $('#list_cate input[type="checkbox"]:checkbox:checked').each(function(i) {
            $id_cate[i] = $(this).val();
        });

        if ($id_cate.length === 0) {
            alert('Vui lòng chọn ít nhất một chuyên mục.');
        } else {
            $.ajax({
                url: 'category/delete',
                type: 'POST',
                data: {
                    id_cate: $id_cate,
                },
                success: function(data) {
                    location.reload();
                },
                error: function() {
                    alert('Đã có lỗi xảy ra, hãy thử lại.');
                }
            });
        }
    } else {
        return false;
    }
});

// Xoá chuyên mục chỉ định trong bảng danh sách
$('.del-cate-list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá chuyên mục này không?');
    if ($confirm == true) {
        $id_cate = $(this).attr('data-id');

        $.ajax({
            url: 'category/delete/' + $id_cate,
            type: 'POST',
            data: '',
            success: function() {
                location.reload();
            }
        });
    } else {
        return false;
    }
});

$('#del_cate').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá chuyên mục này không?');
    if ($confirm == true) {
        $id_cate = $(this).attr('data-id');

        $.ajax({
            url: 'delete/' + $id_cate,
            type: 'POST',
            data: { id_cate: $id_cate },
            success: function() {
                location.href = 'http://localhost/coffeeshop/admin/category';
            }
        });
    } else {
        return false;
    }
});

// Xem ảnh trước
function preUpImg() {
    img_up = $('#img_up').val();
    count_img_up = $('#img_up').get(0).files.length;
    $('.box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
    $('.box-pre-img').removeClass('hidden');

    // Nếu đã chọn ảnh
    if (img_up != '') {
        $('.box-pre-img').html('<p><strong>Ảnh xem trước</strong></p>');
        $('.box-pre-img').removeClass('hidden');
        for (i = 0; i <= count_img_up - 1; i++) {
            $('.box-pre-img').append('<img src="' + URL.createObjectURL(event.target.files[i]) + '" style="border: 1px solid #ddd; width: 100px; height: 100px; margin-right: 5px; margin-bottom: 5px;"/>');
        }
    }
    // Ngược lại chưa chọn ảnh
    else {
        $('.box-pre-img').html('');
        $('.box-pre-img').addClass('hidden');
    }
}

$('#formSearchPost button').on('click', function() {
    $kw_search_post = $('#kw_search_post').val();
    console.log($kw_search_post);
    if ($kw_search_post != '') {
        $.ajax({
            url: $_DOMAIN + 'posts.php',
            type: 'POST',
            data: {
                kw_search_post: $kw_search_post,
                action: 'search_post'
            },
            success: function(data) {
                $('#list_post').html(data);
                $('#paging_post').hide();
            }
        })
    }
});

$('#formStatusWeb button').on('click', function() {
    $stt_web = $('#formStatusWeb input[name="stt_web"]:radio:checked').val();

    $.ajax({
        url: $_DOMAIN + 'setting.php',
        type: 'POST',
        data: {
            stt_web: $stt_web,
            action: 'stt_web'
        },
        success: function() {
            $('#formStatusWeb .alert').attr('class', 'alert alert-success');
            $('#formStatusWeb .alert').html('Thay đổi thành công.');
            location.reload();
        },
        error: function() {
            $('#formStatusWeb .alert').removeClass('hidden');
            $('#formStatusWeb .alert').html('Đã có lỗi xảy ra, hãy thử lại.');
        }
    });
});

$('#formInfoWeb button').on('click', function() {
    $title_web = $('#title_web').val();
    $descr_web = $('#descr_web').val();
    $keywords_web = $('#keywords_web').val();

    $.ajax({
        url: $_DOMAIN + 'setting.php',
        type: 'POST',
        data: {
            title_web: $title_web,
            descr_web: $descr_web,
            keywords_web: $keywords_web,
            action: 'info_web'
        },
        success: function() {
            $('#formInfoWeb .alert').attr('class', 'alert alert-success');
            $('#formInfoWeb .alert').html('Thay đổi thành công.');
            location.reload();
        },
        error: function() {
            $('#formInfoWeb .alert').removeClass('hidden');
            $('#formInfoWeb .alert').html('Đã có lỗi xảy ra, hãy thử lại.');
        }

    });
});

$('#lock_acc_list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn khoá các tài khoản đã chọn không?');
    if ($confirm == true) {
        $id_acc = [];

        $('#list_acc input[type="checkbox"]:checkbox:checked').each(function(i) {
            $id_acc[i] = $(this).val();
        });
        if ($id_acc.length === 0) {
            alert('Vui lòng chọn ít nhất 1 tài khoản.');
        } else {
            $.ajax({
                url: 'account/lock',
                type: 'POST',
                data: {
                    id_acc: $id_acc,
                },
                success: function(data) {
                    location.reload();
                },
                error: function() {
                    alert('Đã có lỗi xảy ra, hãy thử lại.');
                }
            });
        }
    } else {
        return false;
    }
});

$('.lock-acc-list').on('click', function() {
    console.log('chua corfim');
    $confirm = confirm('Bạn có muốn khóa tài khoản này?');
    if ($confirm == true) {
        console.log('da corfim');
        $id_acc = $(this).attr('data-id');
        $.ajax({
            url: 'account/lock/' + $id_acc,
            type: 'POST',
            data: '',
            success: function() {
                location.reload();
            }
        });
    } else {
        return false;
    }
});

$('.unlock-acc-list').on('click', function() {
    console.log('click roi ne');
    $confirm = confirm('Bạn muốn mở khóa tài khoản ?');
    if ($confirm == true) {
        $id_acc = $(this).attr('data-id');
        $.ajax({
            url: 'account/unlock/' + $id_acc,
            type: 'POST',
            data: '',
            success: function() {
                location.reload();
            }
        });
    } else {
        return false;
    }
});

$('#unlock_acc_list').on('click', function() {
    $confirm = confirm('Bạn muốn mở khóa các tài khoản đã chọn ?');
    if ($confirm == true) {
        $id_acc = [];
        $('#list_acc input[type="checkbox"]:checkbox:checked').each(function(i) {
            $id_acc[i] = $(this).val();
        });
        if ($id_acc.length === 0) {
            alert('Vui lòng chọn ít nhất 1 tài khoản!');
        }
        $.ajax({
            url: 'account/unlock',
            type: 'POST',
            data: {
                id_acc: $id_acc,
            },
            success: function(data) {
                location.reload();
            },
            error: function() {
                alert('Có lỗi vui lòng thử lại sau!');
            }
        });
    }
});

$('#del_acc_list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xóa các tài khoản này ?');
    if ($confirm == true) {
        $id_acc = [];
        $('#list_acc input[type="checkbox"]:checkbox:checked').each(function(i) {
            $id_acc[i] = $(this).val();
        });
        if ($id_acc.length === 0) {
            alert('Vui lòng chọn ít nhất 1 tài khoản');
        }
        $.ajax({
            url: 'account/delete',
            type: 'POST',
            data: {
                id_acc: $id_acc,
            },
            success: function(data) {
                location.reload();
            },
            error: function() {
                alert('Có lỗi vui lòng thử lại sau');
            }
        });
    }
});

$('.del-acc-list').on('click', function() {
    $confirm = confirm('Bạn có muốn xóa tài khoản này không ? ');
    if ($confirm == true) {
        $id_acc = $(this).attr('data-id');
        $.ajax({
            url: 'account/delete/' + $id_acc,
            type: 'POST',
            data: '',
            success: function(data) {
                location.reload();
            },
            error: function() {
                alert('Có lỗi vui lòng thử lại sau');
            }
        });
    }
});

$('.del-post-list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá bài viết này không?');
    if ($confirm == true) {
        $id_post = $(this).attr('data-id');

        $.ajax({
            url: 'post/delete/' + $id_post,
            type: 'POST',
            data: '',
            success: function() {
                location.reload();
            }
        });
    } else {
        return false;
    }
});

$('#del_post_list').on('click', function() {
    $confirm = confirm('Bạn có chắc chắn muốn xoá các bài viết đã chọn không?');
    if ($confirm == true) {
        $id_post = [];

        $('#list_post input[type="checkbox"]:checkbox:checked').each(function(i) {
            $id_post[i] = $(this).val();
        });

        if ($id_post.length === 0) {
            alert('Vui lòng chọn ít nhất một bài viết.');
        } else {
            $.ajax({
                url: 'post/delete',
                type: 'POST',
                data: {
                    id_post: $id_post,
                },
                success: function(data) {
                    location.reload();
                },
                error: function() {
                    alert('Đã có lỗi xảy ra, hãy thử lại.');
                }
            });
        }
    } else {
        return false;
    }
});