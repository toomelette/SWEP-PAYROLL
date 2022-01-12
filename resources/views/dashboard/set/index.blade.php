@include('layouts.css-plugins')
<body style="padding: 2em">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default" >
                <div class="panel-heading">Form</div>
                    <form id="set_form">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Select</label>
                                        <select class="form-control" name="dev" required>
                                            <option>21</option>
                                            <option>22</option>
                                            <option selected>23</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="date" name="date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Time</label>
                                        <input type="time" name="time" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary pull-right" type="submit">GO</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>
@include('layouts.js-plugins')
<script type="text/javascript">

    $("#set_form").submit(function (e) {
        e.preventDefault();
        form = $(this);
        $.ajax({
            url : '{{route("dashboard.set")}}?set=1',
            data : form.serialize(),
            type: 'GET',
            headers: {
                {!! __html::token_header() !!}
            },
            success: function (res) {
               if(res == 1){
                   alert('Success');
               }
            },
            error: function (res) {
                console.log(res);
            }
        })
    })
</script>

