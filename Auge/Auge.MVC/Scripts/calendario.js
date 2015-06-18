$(function () {
    var calendar = $('#calendar').calendar(
        {
            language: 'pt-BR',
            tmpl_path: "ThirdParty/bootstrap-calendar-master/tmpls/",
            events_source: function () { return []; },
            onAfterViewLoad: function (view) {
                $('.page-header h3').text(this.getTitle());
                $('.btn-group button').removeClass('active');
                $('button[data-calendar-view="' + view + '"]').addClass('active');
            },
        });

    $('.btn-group button[data-calendar-nav]').each(function () {
        var $this = $(this);
        $this.click(function (event) {
            event.preventDefault();
            calendar.navigate($this.data('calendar-nav'));
        });
    });

    $('.btn-group button[data-calendar-view]').each(function () {
        var $this = $(this);
        $this.click(function (event) {
            event.preventDefault();
            calendar.view($this.data('calendar-view'));
        });
    });

});