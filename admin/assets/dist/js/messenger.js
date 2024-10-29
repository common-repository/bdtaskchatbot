jQuery(document).ready(function () {
    jQuery('.chat-list__in').each(function () {
        const ps = new PerfectScrollbar(jQuery(this)[0]);
    });
    jQuery('.message-content-scroll').each(function () {
        const ps = new PerfectScrollbar(jQuery(this)[0]);
    });

    jQuery('.chat-list__sidebar--right').each(function () {
        const ps = new PerfectScrollbar(jQuery(this)[0]);
    });
    //emojionearea
    jQuery(".emojionearea").emojioneArea({
        pickerPosition: "top",
        filtersPosition: "bottom",
        tones: false,
        autocomplete: false,
        inline: true,
        hidePickerOnBlur: false
    });
    jQuery('[data-toggle="popover"]').popover({
        html: true
//                    trigger: 'focus'
    });
    jQuery('.change-bg-color label').on('click', function () {
        var color = jQuery(this).data('color');

        jQuery('.message-content').each(function () {
            jQuery(this).removeClass(function (index, css) {
                return (css.match(/(^|\s)bg-\S+/g) || []).join(' ');
            });

            jQuery(this).addClass('bg-text-' + color);
        });
    });
    var e = document.getElementById("autobot"),
            d = document.getElementById("manual"),
            t = document.getElementById("switcher");
    e.addEventListener("click", function () {
        t.checked = false;
        e.classList.add("toggler--is-active");
        d.classList.remove("toggler--is-active");
    });
    d.addEventListener("click", function () {
        t.checked = true;
        d.classList.add("toggler--is-active");
        e.classList.remove("toggler--is-active");
    });
    t.addEventListener("click", function () {
        d.classList.toggle("toggler--is-active");
        e.classList.toggle("toggler--is-active");
    });
    //Toggle Search
    jQuery(".chat-header").each(function () {
        jQuery(".search-btn", this).on("click", function (e) {
            e.preventDefault();
            jQuery(".conversation-search").slideToggle();
        });
    });
    jQuery(".close-search").on("click", function () {
        jQuery(".conversation-search").slideUp();
    });
    jQuery('.chat-overlay, .chat-list .item-list').on('click', function () {
        jQuery('.chat-list__sidebar, .chat-list__sidebar--right').removeClass('active');
        jQuery('.chat-overlay').removeClass('active');
    });
    jQuery('.chat-sidebar-collapse').on('click', function () {
        jQuery('.chat-list__sidebar').addClass('active');
        jQuery('.chat-overlay').addClass('active');
        jQuery('.collapse.in').toggleClass('in');
    });
    jQuery('.chat-settings-collapse').on('click', function () {
        jQuery('.chat-list__sidebar--right').addClass('active');
        jQuery('.chat-overlay').addClass('active');
        jQuery('.collapse.in').toggleClass('in');
    });

});
