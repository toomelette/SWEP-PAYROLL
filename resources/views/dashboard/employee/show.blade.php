@php

  $gtChildren = count($employee->employeeChildren) > 11;
  $gtEligibility = count($employee->employeeEligibility) > 10;
  $gtExperience = count($employee->employeeExperience) > 25;
  $gtVoluntaryWork = count($employee->employeeVoluntaryWork) > 7;
  $gtTraining = count($employee->employeeTraining) > 20;
  $gtSpecialSkill = count($employee->employeeSpecialSkill) > 7;
  $gtRecognition = count($employee->employeeRecognition) > 7;
  $gtOrganization = count($employee->employeeOrganization) > 7;
  
@endphp





@extends('layouts.admin-master')

@section('content')

<section class="content-header">
    <h1>Employee Details</h1>
    <div class="pull-right" style="margin-top: -25px;">
      {!! HtmlHelper::back_button(['dashboard.employee.index']) !!}
    </div>
</section>

<section class="content">

    <div class="box">
        
      <div class="box-header with-border">
        <h3 class="box-title">Details</h3>
        <div class="box-tools">
          <a href="#" id="print_info_form" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print Information</a>&nbsp;
          <a href="{{ route('dashboard.employee.print_pds', [ $employee->slug, 'p1' ]) }}" target="_blank" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print PDS Page 1</a>&nbsp;
          <a href="{{ route('dashboard.employee.print_pds', [ $employee->slug, 'p2' ]) }}" target="_blank" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print PDS Page 2</a>&nbsp;
          <a href="{{ route('dashboard.employee.print_pds', [ $employee->slug, 'p3' ]) }}" target="_blank" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print PDS Page 3</a>&nbsp;
          <a href="{{ route('dashboard.employee.print_pds', [ $employee->slug, 'p4' ]) }}" target="_blank" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print PDS Page 4</a>&nbsp;

          @if($gtChildren || $gtEligibility || $gtExperience || $gtVoluntaryWork || $gtTraining || $gtSpecialSkill || $gtRecognition || $gtOrganization)
            <a href="{{ route('dashboard.employee.print_pds', [ $employee->slug, 'p5' ]) }}" target="_blank" class="btn btn-sm btn-default">
              <i class="fa fa-print"></i> Print PDS Extra Page
            </a>&nbsp;
          @endif
          <a href="{{ route('dashboard.employee.edit', $employee->slug) }}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
        </div>
      </div>

      
      <div class="box-body">


        {{-- Personal Info --}}
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Info</h3>
            </div>
            <div class="box-body">
              <dl class="dl-horizontal" style="padding-bottom:60px;">
                <dt>Fullname:</dt>
                <dd>{{ $employee->fullname }}</dd>
                <dt>Date of Birth:</dt>
                <dd>{{ DataTypeHelper::date_parse($employee->date_of_birth, 'M d, Y') }}</dd>
                <dt>Place of Birth:</dt>
                <dd>{{ $employee->place_of_birth }}</dd>
                <dt>Sex:</dt>
                <dd>{{ $employee->sex }}</dd>
                <dt>Civil Status:</dt>
                <dd>{{ $employee->civil_status }}</dd>
                <dt>Height:</dt>
                <dd>{{ $employee->height }}</dd>
                <dt>Weight:</dt>
                <dd>{{ $employee->weight }}</dd>
                <dt>Blood Type:</dt>
                <dd>{{ $employee->blood_type }}</dd>
                <dt>Tel No:</dt>
                <dd>{{ $employee->tel_no }}</dd>
                <dt>Cell No:</dt>
                <dd>{{ $employee->cell_no }}</dd>
                <dt>Email Address:</dt>
                <dd>{{ $employee->email }}</dd>
                <dt>Citizenship:</dt>
                <dd>{{ $employee->citizenship }}</dd>
                <dt>Residential Address:</dt>
                <dd>{{ optional($employee->employeeAddress)->fullResAddress }}</dd>
                <dt>Permanent Address:</dt>
                <dd>{{  optional($employee->employeeAddress)->fullPermAddress }}</dd>
              </dl>
            </div>
          </div>
        </div>



        {{-- Appointment Details --}}
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Appointment Details</h3>
            </div>
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Employee No:</dt>
                <dd>{{ $employee->employee_no }}</dd>
                <dt>Status:</dt>
                <dd>{{ $employee->is_active }}</dd>
                <dt>Position:</dt>
                <dd>{{ $employee->position }}</dd>
                <dt>Salary Grade:</dt>
                <dd>{{ $employee->salary_grade }}</dd>
                <dt>Step Increment:</dt>
                <dd>{{ $employee->step_inc }}</dd>
                <dt>Appointment Status:</dt>
                <dd>{{ $employee->appointment_status }}</dd>
                <dt>Item No:</dt>
                <dd>{{ $employee->item_no }}</dd>
                <dt>Monthly Basic:</dt>
                <dd>{{ number_format($employee->monthly_basic, 2) }}</dd>
                <dt>ACA:</dt>
                <dd>{{ number_format($employee->aca, 2) }}</dd>
                <dt>PERA:</dt>
                <dd>{{ number_format($employee->pera, 2) }}</dd>
                <dt>Food Subsidy:</dt>
                <dd>{{ number_format($employee->food_subsidy, 2) }}</dd>
                <dt>RA:</dt>
                <dd>{{ number_format($employee->ra, 2) }}</dd>
                <dt>TA:</dt>
                <dd>{{ number_format($employee->ta, 2) }}</dd>
                <dt>Government Service:</dt>
                <dd>{{ DataTypeHelper::date_parse($employee->firstday_gov, 'M d, Y') }}</dd>
                <dt>First Day:</dt>
                <dd>{{ DataTypeHelper::date_parse($employee->firstday_sra, 'M d, Y') }}</dd>
                <dt>Appointment Date:</dt>
                <dd>{{ DataTypeHelper::date_parse($employee->appointment_date, 'M d, Y') }}</dd>
                <dt>Adjustment Date:</dt>
                <dd>{{ DataTypeHelper::date_parse($employee->adjustment_date, 'M d, Y') }}</dd>
              </dl>
            </div>
          </div>
        </div>




        {{-- ID's --}}
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Personal ID's</h3>
            </div>
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>GSIS:</dt>
                <dd>{{ $employee->gsis }}</dd>
                <dt>SSS:</dt>
                <dd>{{ $employee->sss }}</dd>
                <dt>PHILHEALTH:</dt>
                <dd>{{ $employee->philhealth }}</dd>
                <dt>TIN:</dt>
                <dd>{{ $employee->tin }}</dd>
                <dt>HDMF:</dt>
                <dd>{{ $employee->hdmf }}</dd>
                <dt>GSIS:</dt>
                <dd>{{ $employee->gsis }}</dd>
                <dt>HDMF Premium:</dt>
                <dd>{{ number_format($employee->hdmfpremiums, 2) }}</dd>
              </dl>
            </div>
          </div>
        </div>




        {{-- Family Info --}}
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Family Info</h3>
            </div>
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Fathers Name</dt>
                <dd>{{ optional($employee->employeeFamilyDetail)->father_firstname . " " . substr(optional($employee->employeeFamilyDetail)->father_middlename , 0, 1) . ". " . optional($employee->employeeFamilyDetail)->father_lastname }}</dd>
                <dt>Mothers Name:</dt>
                <dd>{{ optional($employee->employeeFamilyDetail)->mother_firstname . " " . substr(optional($employee->employeeFamilyDetail)->mother_middlename , 0, 1) . ". " . optional($employee->employeeFamilyDetail)->mother_lastname }}</dd>
                <dt>Spouse Name:</dt>
                <dd>{{ optional($employee->employeeFamilyDetail)->spouse_firstname . " " . substr(optional($employee->employeeFamilyDetail)->spouse_middlename , 0, 1) . ". " . optional($employee->employeeFamilyDetail)->spouse_lastname }}</dd>
              </dl>
              <span style="font-size:17px;">Children:</span>
              <div class="box-body" style="overflow-x:auto;">

                <table class="table table-bordered">

                  <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                  </tr>
                  @foreach($employee->employeeChildren as $data)
                    <tr>
                      <td>{{ $data->fullname }}</td>
                      <td>{{ DataTypeHelper::date_parse($data->date_of_birth, 'M d, Y') }}</td>
                    </tr>
                  @endforeach

                </table>

                @if($employee->employeeChildren->isEmpty())
                  <div style="padding :5px;">
                    <center><h4>No Records found!</h4></center>
                  </div>
                @endif

              </div>

            </div>
          </div>
        </div>




        {{-- Educational Background --}}
         <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Educational Background</h3>
            </div>
            <div class="box-body" style="overflow-x:auto;">

              <table class="table table-bordered">

                <tr>
                  <th>Level</th>
                  <th>Name of School</th>
                  <th>Course</th>
                  <th>Graduate Year</th>
                </tr>
                @foreach($employee->employeeEducationalBackground as $data) 
                  <tr>
                    <td>{{ $data->level }}</td>
                    <td>{{ $data->school_name }}</td>
                    <td>{{ $data->course }}</td>
                    <td>{{ $data->graduate_year }}</td>
                  </tr>
                @endforeach

              </table>

              @if($employee->employeeEducationalBackground->isEmpty())
                <div style="padding :5px;">
                  <center><h4>No Records found!</h4></center>
                </div>
              @endif

            </div>

          </div>
        </div>




        {{-- Trainings --}}
         <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Trainings</h3>
            </div>
            <div class="box-body" style="overflow-x:auto;">

              <table class="table table-bordered">

                <tr>
                  <th>Topics</th>
                  <th>Conducted by</th>
                  <th>Date</th>
                  <th>Venue</th>
                </tr>
                @foreach($employee->employeeTraining as $data) 
                  <tr>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->conducted_by }}</td>
                    <td>
                      @if(DataTypeHelper::date_parse($data->date_from, 'M') == DataTypeHelper::date_parse($data->date_to, 'M'))
                        
                        {{ DataTypeHelper::date_parse($data->date_from, 'M d') .' - '. DataTypeHelper::date_parse($data->date_to, 'd, Y') }}  

                      @else

                        {{ DataTypeHelper::date_parse($data->date_from, 'M d, Y') .' - '. DataTypeHelper::date_parse($data->date_to, 'M d, Y') }}

                      @endif
                    </td>
                    <td>{{ $data->venue }}</td>
                  </tr>
                @endforeach

              </table>

              @if($employee->employeeTraining->isEmpty())
                <div style="padding :5px;">
                  <center><h4>No Records found!</h4></center>
                </div>
              @endif

            </div>

          </div>
        </div>




        {{-- Eligibilities --}}
         <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Eligibilities</h3>
            </div>
            <div class="box-body" style="overflow-x:auto;">

              <table class="table table-bordered">

                <tr>
                  <th>Eligibility</th>
                  <th>Level</th>
                  <th>Rating</th>
                </tr>
                @foreach($employee->employeeEligibility as $data)
                  <tr>
                    <td>{{ $data->eligibility }}</td>
                    <td>{{ $data->level }}</td>
                    <td>{{ $data->rating }}</td>
                  </tr>
                @endforeach

              </table>

              @if($employee->employeeEligibility->isEmpty())
                <div style="padding :5px;">
                  <center><h4>No Records found!</h4></center>
                </div>
              @endif

            </div>

          </div>
        </div>




        {{-- Work Experience --}}
         <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Work Experience</h3>
            </div>
            <div class="box-body" style="overflow-x:auto;">

              <table class="table table-bordered">

                <tr>
                  <th>Company</th>
                  <th>Position</th>
                  <th>Appointment Status</th>
                </tr>
                @foreach($employee->employeeExperience as $data) 
                  <tr>
                    <td>{{ $data->company }}</td>
                    <td>{{ $data->position }}</td>
                    <td>{{ $data->appointment_status }}</td>
                  </tr>
                @endforeach

              </table>

              @if($employee->employeeExperience->isEmpty())
                <div style="padding :5px;">
                  <center><h4>No Records found!</h4></center>
                </div>
              @endif

            </div>

          </div>
        </div>





        {{-- Voluntary Works --}}
         <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Voluntary Works</h3>
            </div>
            <div class="box-body" style="overflow-x:auto;">

              <table class="table table-bordered">

                <tr>
                  <th>Name of Organization</th>
                  <th>Position</th>
                </tr>
                @foreach($employee->employeeVoluntaryWork as $data) 
                  <tr>
                    <td>{{ $data->name }}</td>   
                    <td>{{ $data->position }}</td>                 
                  </tr>
                @endforeach

              </table>

              @if($employee->employeeVoluntaryWork->isEmpty())
                <div style="padding :5px;">
                  <center><h4>No Records found!</h4></center>
                </div>
              @endif

            </div>

          </div>
        </div>





        {{-- Recognition --}}
         <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Recognitions</h3>
            </div>
            <div class="box-body" style="overflow-x:auto;">

              <table class="table table-bordered">

                <tr>
                  <th>Title</th>
                </tr>
                @foreach($employee->employeeRecognition as $data) 
                  <tr>
                    <td>{{ $data->title }}</td>                  </tr>
                @endforeach

              </table>

              @if($employee->employeeRecognition->isEmpty())
                <div style="padding :5px;">
                  <center><h4>No Records found!</h4></center>
                </div>
              @endif

            </div>

          </div>
        </div>




        {{-- Organization --}}
         <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Organizations</h3>
            </div>
            <div class="box-body" style="overflow-x:auto;">

              <table class="table table-bordered">

                <tr>
                  <th>Name of Organization</th>
                </tr>
                @foreach($employee->employeeOrganization as $data) 
                  <tr>
                    <td>{{ $data->name }}</td>                  </tr>
                @endforeach

              </table>

              @if($employee->employeeOrganization->isEmpty())
                <div style="padding :5px;">
                  <center><h4>No Records found!</h4></center>
                </div>
              @endif

            </div>

          </div>
        </div>




        {{-- Special SKills --}}
         <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Special Skills</h3>
            </div>
            <div class="box-body" style="overflow-x:auto;">

              <table class="table table-bordered">

                <tr>
                  <th>Special Skills or Hobies</th>
                </tr>
                @foreach($employee->employeeSpecialSkill as $data) 
                  <tr>
                    <td>{{ $data->description }}</td>                
                  </tr>
                @endforeach

              </table>

              @if($employee->employeeSpecialSkill->isEmpty())
                <div style="padding :5px;">
                  <center><h4>No Records found!</h4></center>
                </div>
              @endif

            </div>

          </div>
        </div>




        {{-- References --}}
         <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">References</h3>
            </div>
            <div class="box-body" style="overflow-x:auto;">

              <table class="table table-bordered">

                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Tel No.</th>
                </tr>
                @foreach($employee->employeeReference as $data) 
                  <tr>
                    <td>{{ $data->fullname }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->tel_no }}</td>                 
                  </tr>
                @endforeach

              </table>

              @if($employee->employeeReference->isEmpty())
                <div style="padding :5px;">
                  <center><h4>No Records found!</h4></center>
                </div>
              @endif

            </div>

          </div>
        </div>




      </div>

    </div>

</section>

@endsection




@section('modals')

  {{-- Employee Info Form --}}
  <div class="modal fade" id="print_info_modal" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">
            <i class="fa fa-hand-pointer-o"></i>&nbsp;
            Please select Modules that you want to Print.
          </h4>
        </div>
        <div class="modal-body" id="delete_body">
          <form method="GET" action="{{ route('dashboard.employee.print_info', $employee->slug) }}" target="_blank">
            
            <div class="checkbox">
              <label>
                <input type="checkbox" name="p_info">
                Personal Information
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="appt_dtl">
                Appointment Details
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="p_id">
                Personal ID's
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="f_info">
                Family Information
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="edc_bg">
                Educational Background 
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="trn_sem">
                Trainings / Seminars
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="elig">
                Eligibilities
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="wrk_exp">
                Work Experience
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="vol_wrk">
                Voluntary Works
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="recog">
                Recognitions
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="org">
                Organizations
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="ss">
                Special Skills
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="ref">
                References
              </label>
            </div>


          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Print</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection





@section('scripts')

  <script type="text/javascript">
    
    {{-- CALL Employee Info Form --}}
    $(document).on("click", "#print_info_form", function () {
        $("#print_info_modal").modal("show");
    });


  </script>

@endsection