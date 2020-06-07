<div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="avatarModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="now-ui-icons ui-1_simple-remove" style="color: #0062cc"></i>
                </button>
                <h5 class="modal-title " id="myModalLabel">Change your Avatar</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-8 ml-auto mr-auto">
                    <img class="rounded img-raised" src="/storage/avatars/{{$user->avatar}}" alt="">
                </div>
            </div>
            <div class="modal-footer justify-content-center ml-auto mr-auto">
                <form action="/profile" method="post" enctype="multipart/form-data" style="inline">
                    @csrf
                    <div class="form-group ml-auto mr-auto">
                        <span class="btn btn-raised btn-round btn-default btn-file">
                    <span class="fileinput-new">Upload Photo</span>
                    <input type="file" name="avatar" id="avatarFile">
                  </span>
                    </div>
                    <br>
                    <div class="form-group ml-1">
                        <button type="submit" class="btn btn-info btn-round">Update Avatar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--<div class="modal-body">--}}
    {{--<div class="instruction">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8">--}}
                {{--<strong>1. Register</strong>--}}
                {{--<p class="description">The first step is to create an account at--}}
                    {{--<a href="http://www.creative-tim.com/">Creative Tim</a>. You can choose a social network or go for the classic version, whatever works best for you.</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="picture">--}}
                    {{--<img src="/storage/avatars/{{$user->avatar}}" alt="Thumbnail Image" class="rounded img-raised">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="instruction">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8">--}}
                {{--<strong>2. Apply</strong>--}}
                {{--<p class="description">The first step is to create an account at--}}
                    {{--<a href="http://www.creative-tim.com/">Creative Tim</a>. You can choose a social network or go for the classic version, whatever works best for you.</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="picture">--}}
                    {{--<img src="/assets/img/project9.jpg" alt="Thumbnail Image" class="rounded img-raised">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<p>If you have more questions, don't hesitate to contact us or send us a tweet @creativetim. We're here to help!</p>--}}
{{--</div>--}}
