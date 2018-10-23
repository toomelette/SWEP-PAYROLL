<?php
 
namespace App\Swep\Services;


use App\Swep\Interfaces\ApplicantInterface;
use App\Swep\BaseClasses\BaseService;



class ApplicantService extends BaseService{



    protected $applicant_repo;



    public function __construct(ApplicantInterface $applicant_repo){

        $this->applicant_repo = $applicant_repo;
        parent::__construct();

    }





    public function fetchAll($request){

        $applicants = $this->applicant_repo->fetchAll($request);

        $request->flash();
        return view('dashboard.applicant.index')->with('applicants', $applicants);

    }






    public function store($request){

        $applicant = $this->applicant_repo->store($request);
        $this->fillDependencies($request, $applicant);

        $this->event->fire('applicant.store');
        return redirect()->back();

    }






    public function show($slug){

        $applicant = $this->applicant_repo->findBySlug($slug);
        return view('dashboard.applicant.show')->with('applicant', $applicant);

    }






    public function edit($slug){

        $applicant = $this->applicant_repo->findBySlug($slug);
        return view('dashboard.applicant.edit')->with('applicant', $applicant);

    }





    public function update($request, $slug){

        $applicant = $this->applicant_repo->update($request, $slug);
        $this->fillDependencies($request, $applicant);

        $this->event->fire('applicant.update', $applicant);
        return redirect()->route('dashboard.applicant.index');

    }





    public function destroy($slug){

        $applicant = $this->applicant_repo->destroy($slug);

        $this->event->fire('applicant.destroy', $applicant );
        return redirect()->route('dashboard.applicant.index');

    }







    public function fillDependencies($request, $applicant){

        // Applicant Training
        if(!empty($request->row_training)){
            foreach ($request->row_training as $row) {
                $this->applicant_repo->storeTrainings($row, $applicant);
            }
        }

        // Applicant Experience
        if(!empty($request->row_exp)){
            foreach ($request->row_exp as $row) {
                $this->applicant_repo->storeExperience($row, $applicant);
            }
        }

        // Applicant Educational Background
        if(!empty($request->row_edc_background)){
            foreach ($request->row_edc_background as $row) {
                $this->applicant_repo->storeEducationalBackground($row, $applicant);
            }
        }

    }






}