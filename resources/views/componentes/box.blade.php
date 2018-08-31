<div class="m-portlet  {{$cor}}">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
                                                    {{$icon or null}}
												</span>
                <h3 class="m-portlet__head-text">
                    {{$title}}
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            {{$acoes or null}}

        </div>
    </div>
    <div class="m-portlet__body">
        @if($erro==1)
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif

            @if(Session::has('status'))
                <div id="msg-suc" class="alert alert-success">
                    {{Session::get('status')}}
                </div>
            @endif
        @endif


        {{$slot}}


    </div>
</div>