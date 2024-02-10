/**
* Template Name: NiceAdmin - v2.4.1
* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        if (all) {
            select(el, all).forEach(e => e.addEventListener(type, listener))
        } else {
            select(el, all).addEventListener(type, listener)
        }
    }

    /**
     * Easy on scroll event listener 
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
     * Sidebar toggle
     */
    if (select('.toggle-sidebar-btn')) {
        on('click', '.toggle-sidebar-btn', function (e) {
            select('body').classList.toggle('toggle-sidebar')
        })
    }

    /**
     * Search bar toggle
     */
    if (select('.search-bar-toggle')) {
        on('click', '.search-bar-toggle', function (e) {
            select('.search-bar').classList.toggle('search-bar-show')
        })
    }

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select('#navbar .scrollto', true)
    const navbarlinksActive = () => {
        let position = window.scrollY + 200
        navbarlinks.forEach(navbarlink => {
            if (!navbarlink.hash) return
            let section = select(navbarlink.hash)
            if (!section) return
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                navbarlink.classList.add('active')
            } else {
                navbarlink.classList.remove('active')
            }
        })
    }
    window.addEventListener('load', navbarlinksActive)
    onscroll(document, navbarlinksActive)

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select('#header')
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add('header-scrolled')
            } else {
                selectHeader.classList.remove('header-scrolled')
            }
        }
        window.addEventListener('load', headerScrolled)
        onscroll(document, headerScrolled)
    }

    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    /**
     * Initiate tooltips
     */
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    /**
     * Initiate quill editors
     */
    if (select('.quill-editor-default')) {
        new Quill('.quill-editor-default', {
            theme: 'snow'
        });
    }

    if (select('.quill-editor-bubble')) {
        new Quill('.quill-editor-bubble', {
            theme: 'bubble'
        });
    }

    if (select('.quill-editor-full')) {
        new Quill(".quill-editor-full", {
            modules: {
                toolbar: [
                    [{
                        font: []
                    }, {
                        size: []
                    }],
                    ["bold", "italic", "underline", "strike"],
                    [{
                        color: []
                    },
                    {
                        background: []
                    }
                    ],
                    [{
                        script: "super"
                    },
                    {
                        script: "sub"
                    }
                    ],
                    [{
                        list: "ordered"
                    },
                    {
                        list: "bullet"
                    },
                    {
                        indent: "-1"
                    },
                    {
                        indent: "+1"
                    }
                    ],
                    ["direction", {
                        align: []
                    }],
                    ["link", "image", "video"],
                    ["clean"]
                ]
            },
            theme: "snow"
        });
    }

    /**
     * Initiate TinyMCE Editor
     */
    if(select('textarea.tinymce-editor')) {
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea.tinymce-editor',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'wordcount undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [{
                title: 'My page 1',
                value: 'https://www.tiny.cloud'
            },
            {
                title: 'My page 2',
                value: 'http://www.moxiecode.com'
            }
            ],
            image_list: [{
                title: 'My page 1',
                value: 'https://www.tiny.cloud'
            },
            {
                title: 'My page 2',
                value: 'http://www.moxiecode.com'
            }
            ],
            image_class_list: [{
                title: 'None',
                value: ''
            },
            {
                title: 'Some class',
                value: 'class-name'
            }
            ],
            importcss_append: true,
            file_picker_callback: (callback, value, meta) => {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {
                        text: 'My text'
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {
                        alt: 'My alt text'
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.google.com/logos/google.jpg'
                    });
                }
            },
            templates: [{
                title: 'New Table',
                description: 'creates a new table',
                content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {
                title: 'Starting my story',
                description: 'A cure for writers block',
                content: 'Once upon a time...'
            },
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    }

    /**
     * Initiate Bootstrap validation check
     */
    var needsValidation = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(needsValidation)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })

    /**
     * Initiate Datatables
     */
    const datatables = select('.datatable', true)
    datatables.forEach(datatable => {
        new simpleDatatables.DataTable(datatable);
    })

    /**
     * Autoresize echart charts
     */
    const mainContainer = select('#main');
    if (mainContainer) {
        setTimeout(() => {
            new ResizeObserver(function () {
                select('.echart', true).forEach(getEchart => {
                    echarts.getInstanceByDom(getEchart).resize();
                })
            }).observe(mainContainer);
        }, 200);
    }

    /**
     * Initiate Choices MultiSelector
     */
    if(select('#cypBanner_multiSelect')) {
        var multipleCancelButton = new Choices('#cypBanner_multiSelect', {
            removeItemButton: true,
            maxItemCount: 3,
            searchResultLimit: 5,
            renderChoiceLimit: 10
        });
    }
    if(select('#cs_grid')) {
        var multipleCancelButton = new Choices('#cs_grid', {
            removeItemButton: true,
            maxItemCount: 4,
            searchResultLimit: 5,
            renderChoiceLimit: 10
        });
    }
    if(select('#tag_multiSelect')) {
        var multipleCancelButton = new Choices('#tag_multiSelect', {
            removeItemButton: true,
            maxItemCount: 10,
            searchResultLimit: 5,
            renderChoiceLimit: 5
        });
    }
    if(select('#author_multiSelect')) {
        var multipleCancelButton = new Choices('#author_multiSelect', {
            removeItemButton: true,
            maxItemCount: 10,
            searchResultLimit: 5,
            renderChoiceLimit: 5
        });
    }
    if(select('#sfirst_articles_multiSelect')) {
        var multipleCancelButton = new Choices('#sfirst_articles_multiSelect', {
            removeItemButton: true,
            maxItemCount: 2,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#s-watch_others_multiSelect')) {
        var multipleCancelButton = new Choices('#s-watch_others_multiSelect', {
            removeItemButton: true,
            maxItemCount: 3,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#s-agenda_multiSelect')) {
        var multipleCancelButton = new Choices('#s-agenda_multiSelect', {
            removeItemButton: true,
            maxItemCount: 4,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#s-scoop_multiSelect')) {
        var multipleCancelButton = new Choices('#s-scoop_multiSelect', {
            removeItemButton: true,
            maxItemCount: 3,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }    
    if(select('#s-fullscreen_multiSelect')) {
        var multipleCancelButton = new Choices('#s-fullscreen_multiSelect', {
            removeItemButton: true,
            maxItemCount: 2,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#s-g-three_multiSelect')) {
        var multipleCancelButton = new Choices('#s-g-three_multiSelect', {
            removeItemButton: true,
            maxItemCount: 3,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#s-g-five_multiSelect')) {
        var multipleCancelButton = new Choices('#s-g-five_multiSelect', {
            removeItemButton: true,
            maxItemCount: 5,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#list_one_multiSelect')) {
        var multipleCancelButton = new Choices('#list_one_multiSelect', {
            removeItemButton: true,
            maxItemCount: 4,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#list_two_multiSelect')) {
        var multipleCancelButton = new Choices('#list_two_multiSelect', {
            removeItemButton: true,
            maxItemCount: 4,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#list_three_multiSelect')) {
        var multipleCancelButton = new Choices('#list_three_multiSelect', {
            removeItemButton: true,
            maxItemCount: 4,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#list_four_multiSelect')) {
        var multipleCancelButton = new Choices('#list_four_multiSelect', {
            removeItemButton: true,
            maxItemCount: 4,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#list_five_multiSelect')) {
        var multipleCancelButton = new Choices('#list_five_multiSelect', {
            removeItemButton: true,
            maxItemCount: 4,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    if(select('#cyp_multiSelect')) {
        var multipleCancelButton = new Choices('#cyp_multiSelect', {
            removeItemButton: true,
            maxItemCount: 10,
            searchResultLimit: 10,
            renderChoiceLimit: 5
        });
    }
    /**
     * File input event
     */
     $('#formFile').on('change', function(e) {
        if($(this).closest('.th_input').find('.w-100').length != 0){
            $(this).closest('.th_input').find('img').attr("src",URL.createObjectURL(e.target.files[0]));
        } else {
            $(this).closest('.th_input').append('<img class="w-100" src="'+URL.createObjectURL(e.target.files[0])+'" alt="">')
        }
        if($('.profile .profile-edit img').length > 0) {
            $('.profile .profile-edit img').attr("src",URL.createObjectURL(e.target.files[0]));
        }
    });

    $('#formFile1').on('change', function(e) {
        if($(this).closest('.th_input_half').find('.w-100').length != 0){
            $(this).closest('.th_input_half').find('img').attr("src",URL.createObjectURL(e.target.files[0]));
        } else {
            $(this).closest('.th_input_half').append('<img class="w-100" src="'+URL.createObjectURL(e.target.files[0])+'" alt="">')
        }
        if($('.profile .profile-edit img').length > 0) {
            $('.profile .profile-edit img').attr("src",URL.createObjectURL(e.target.files[0]));
        }
    });

    $('#formFile2').on('change', function(e) {
        if($(this).closest('.th_input_content').find('.w-100').length != 0){
            $(this).closest('.th_input_content').find('img').attr("src",URL.createObjectURL(e.target.files[0]));
        } else {
            $(this).closest('.th_input_content').append('<img class="w-100" src="'+URL.createObjectURL(e.target.files[0])+'" alt="">')
        }
        if($('.profile .profile-edit img').length > 0) {
            $('.profile .profile-edit img').attr("src",URL.createObjectURL(e.target.files[0]));
        }
    });
    /**
     * Article wordcount
     */
    $('form#article').on('submit', function(){
        $('input[name="wordcount"]').val(parseInt($('#content-word-count').text()));
    })

    $('#article_delete_modal').on('show.bs.modal', function(e) {
        var url = $(e.relatedTarget).data('url');

        $(e.currentTarget).find('#article_delete_form').attr("action", url);
    });
    $('#author_article_delete_modal').on('show.bs.modal', function(e) {
        var url = $(e.relatedTarget).data('url');

        $(e.currentTarget).find('#author_article_delete_form').attr("action", url);
    });
    $('#category_delete_modal').on('show.bs.modal', function(e) {
        $('.modal-body').hide();
        $('.modal-footer').hide();
        var url = $(e.relatedTarget).data('url');
        var id = $(e.relatedTarget).data('id');
        var aurl = $(e.relatedTarget).data('aurl');
        $.ajax({
            url: aurl,
            type: 'post',
            data:{'id': id},
            success:function(res){
                if(res.length === 0){
                    $('.modal-body.category-not-used').show();
                    $('.modal-footer').show();
                } else {
                    $('.modal-body.category-used').show();
                    $('.modal-body.category-used .articles').empty()
                    for(var i = 0; i<res.length; i++)
                    $('.modal-body.category-used .articles').append('<p class="fw-bold">'+res[i]['title']+'</p>')
                }
                //console.log(res);
            }
        })

        $(e.currentTarget).find('#category_delete_form').attr("action", url);
    });
    $('#tag_delete_modal').on('show.bs.modal', function(e) {
        $('.modal-body').hide();
        $('.modal-footer').hide();
        var url = $(e.relatedTarget).data('url');
        var id = $(e.relatedTarget).data('id');
        var aurl = $(e.relatedTarget).data('aurl');
        $.ajax({
            url: aurl,
            type: 'post',
            data:{'id': id},
            success:function(res){
                if(res.length === 0){
                    $('.modal-body.tag-not-used').show();
                    $('.modal-footer').show();
                } else {
                    $('.modal-body.tag-used').show();
                    $('.modal-body.tag-used .articles').empty()
                    for(var i = 0; i<res.length; i++)
                    $('.modal-body.tag-used .articles').append('<p class="fw-bold">'+res[i]['title']+'</p>')
                }
                //console.log(res);
            }
        })

        $(e.currentTarget).find('#tag_delete_form').attr("action", url);
    });
    $('#profile_delete_modal').on('show.bs.modal', function(e) {
        var url = $(e.relatedTarget).data('url');

        $(e.currentTarget).find('#profile_delete_form').attr("action", url);
    });
    $('#cypEvent_delete_modal').on('show.bs.modal', function(e) {
        var url = $(e.relatedTarget).data('url');

        $(e.currentTarget).find('#cypEvent_delete_form').attr("action", url);
    });
    $('#orcafile_delete_modal').on('show.bs.modal', function(e) {
        var url = $(e.relatedTarget).data('url');

        $(e.currentTarget).find('#orcafile_delete_form').attr("action", url);
    });
})();