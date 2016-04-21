<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> {{ trans("user.logout-question") }}</div>
            <div class="mb-content">
                <p>{{ trans("user.logout-confirm") }}</p>
                <p>{{ trans("user.logout-description") }}</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{ route("backend.user.logout") }}" class="btn btn-success btn-lg">{{ trans("user.logout-yes") }}</a>
                    <button class="btn btn-default btn-lg mb-control-close">{{ trans("user.logout-no") }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->