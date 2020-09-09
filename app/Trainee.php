<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{

    protected $table        = 'Access.TraineeApplication';

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $guarded = [];

    public function submitter()
    {
        return $this->belongsTo('App\Submitter', 'Submitter', 'ID');
    }
    
    public function image()
    {
        return $this->hasOne('App\TraineeImage', 'ID', 'Photo');
    }

    public function household()
    {
        return $this->hasOne('App\HouseHold', 'Personal ID', 'ID');
    }

    public function registration()
    {
        return $this->hasOne('App\RegistrationData', 'Application ID', 'ID');
    }

    public function trainingAccesses()
    {
        return $this->hasMany('App\TrainingAccessed', 'Personal ID', 'ID');
    }

    public function trainingSupports(){
        return $this->hasMany('App\PostTrainingSupport', 'Personal ID', 'ID');
    }

    public function supportEmployments(){
        return $this->hasMany('App\PostTrainingEmployment', 'personal ID', 'ID');
    }

    public function employmenttype()
    {
        return $this->hasOne('App\EmploymentType', 'Unemp ID', 'Employment Type');
    }

    public static $sexes = [
        
        'ប្រុស/Male'    => 'ប្រុស/Male',
        'ស្រី/Female'   => 'ស្រី/Female'
    ];

    public static $maritals = [
        
        'នៅលីវ/Single'  => 'នៅលីវ/Single',
        'មានគ្រួសារ/Married'    => 'មានគ្រួសារ/Married',
        'ម៉េម៉ាយ ឬ ពោះម៉ាយ/Widowed'   => 'ម៉េម៉ាយ ឬ ពោះម៉ាយ/Widowed',
        'លែងលះគ្នា/Separated'   => 'លែងលះគ្នា/Separated'
    ];

    public static $ethnics  = [
        
        'ខ្មែរ/Khmer'   => 'ខ្មែរ/Khmer',
        'ក្រុមជនជាតិភាគតិច/Ethnic Minority' => 'ក្រុមជនជាតិភាគតិច/Ethnic Minority',
        'ផ្សេងៗ/Non-Asian' => 'ផ្សេងៗ/Non-Asian',
    ];

    public function ethnics()
    {
        return $this->belongsTo('App\EthnicGroup', 'ID', 'If Yes EMG');
    }


    public static $educationlevels = [
       
        '0' => 'No Schooling',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '12+' => '12+',
    ];

    public static $childs = [
        
        'បាទ/Yes' => 'បាទ/Yes' ,
        'ទេ/No' => 'ទេ/No' , 
    ];

    public static $numchildrens = [
        
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '8+' => '8+',   

    ];    

    public static $poorid = [
        
        'ប័ណ្ណក្រីក្រកំរិត ១/ID Poor 1' => 'ប័ណ្ណក្រីក្រកំរិត ១/ID Poor 1' ,
        'ប័ណ្ណក្រីក្រកំរិត ២/ID Poor 2' => 'ប័ណ្ណក្រីក្រកំរិត ២/ID Poor 2' ,
        'ក្រប៉ុន្តែគ្មានប័ណ្ណក្រីក្រ/Poor without ID' => 'ក្រប៉ុន្តែគ្មានប័ណ្ណក្រីក្រ/Poor without ID' ,
    ];

    public static $relationships = [
        
        'ឪពុក/Father' => 'ឪពុក/Father' ,
        'ម្ដាយ/Mother' => 'ម្ដាយ/Mother' ,
        'បងស្រី/Sister' => 'បងស្រី/Sister' ,
        'បងប្រុស/Brother' => 'បងប្រុស/Brother' ,
        'ជីដូន/Grandmother' => 'ជីដូន/Grandmother' ,
        'ជីតា/Grandfather' => 'ជីតា/Grandfather' , 
        'ឪពុកមា/Uncle' => 'ឪពុកមា/Uncle' , 
        'ម្ដាយមីង/Aunt' => 'ម្ដាយមីង/Aunt' ,  
        'ផ្សេងៗ/Other'=> 'ផ្សេងៗ/Other',  
    ];

    public static $visits = [
        '' => '' ,
        'តើអ្នក/Initial' => 'តើអ្នក/Initial' ,
    ];

    public static $householdmembers = [
        
        '0' => '0' ,
        '1' => '1' ,
        '2' => '2' ,
        '3' => '3' ,
        '4' => '4' ,
        '5' => '5' ,
        '6' => '6' ,
        '7' => '7' ,
        '8 or more' => '8 or more' ,
    ];

    public static $workmembers = [
        
        '0' => '0' ,
        '1' => '1' ,
        '2' => '2' ,
        '3 or more' => '3 or more' ,
    ] ;

    public static $languages = [
        
        'a No head/spouse​' => 'a No head/spouse​' ,
        'b No can not' => 'b No can not' ,
        'c Yes can' => 'c Yes can' ,
    ] ;

    public static $materials = [
        
        'a Bamboo, thatch/leaves, clay/dung with straw' => 'a Bamboo, thatch/leaves, clay/dung with straw​' ,
        'b Wood, plywood, metal sheets, or fibrous cement/asbestos' => 'b Wood, plywood, metal sheets, or fibrous cement/asbestos' ,
        'c Concrete, brick, or stone' => 'c Concrete, brick, or stone' ,
    ] ;

    public static $roofmaterials = [
        
        'a Thatch/leaves, plastic sheets, salvaged materials,' => 'a Thatch/leaves, plastic sheets, salvaged materials,​' ,
        'b Galvanized iron or aluminium, or mixed iron/aluminium/tiles/fibrous cement' => 'b Galvanized iron or aluminium, or mixed iron/aluminium/tiles/fibrous cement' ,
        'c Tiles, fibrous cement, or concrete' => 'c Tiles, fibrous cement, or concrete' ,
    ] ;
    
    public static $cdplayers = [
        
        'a No' => 'a No​' ,
        'b Only TV' => 'b Only TV' ,
        'c Video/VCD/DVD' => 'c Video/VCD/DVD' ,
    ];

    public static $answers = [

        '1' => 'បាទ/Yes' ,
        '0' => 'ទេ/No' , 
    ];

    public static $yesornos = [
        
        'បាទ/Yes' => 'បាទ/Yes' ,
        'ទេ/No' => 'ទេ/No' , 
    ];

    public static $totalormonthly = [
        
        'Monthly' => 'Monthly' ,
        'Total' => 'Total' , 
    ];

    public static $statuses = [
        'កំពុងសិក្សា/Studying' => 'កំពុងសិក្សា/Studying' ,
        'បោះបង់់ការសិក្សា/Dropped out' => 'បោះបង់់ការសិក្សា/Dropped out' , 
        'រៀនចប់ហើយ/Finished' => 'រៀនចប់ហើយ/Finished' , 
        'មរណភាព/Passed away' => 'មរណភាព/Passed away',
        'ព្យួរការសិក្សា/Suspended' => 'ព្យួរការសិក្សា/Suspended'
    ];

    public static $reasonDropOut = [
        '01' => 'មូលហេតុគ្រួសារ/ Family reasons' ,
        '02' => 'មូលហេតុសុខភាព/ Health reasons' , 
        '03' => 'មូលហេតុផ្ទាល់ខ្លួន/ Personal reasons' , 
        '04' => 'ឈប់ដោយសារមានការងារមិនពាក់ព័ន្ធវគ្គបណ្ដុះបណ្ដាល / Unrelated employment',
        '05' => 'ឈប់ដោយសារមានការងារពាក់ព័ន្ធវគ្គបណ្ដុះបណ្ដាល/ Related employment',
        '06' => 'ប្រព្រឹត្តខុសនឹងបទបញ្ជាផ្ទៃក្នុងរបស់មជ្ឈមណ្ឌល/ Violation of center rules/ regulations',
        '07' => 'មិនប្រាប់មូលហេតុ ឬមិនច្បាស់/ Reason NOT provided or Unclear',
        '08' => 'បញ្ហាទាក់ទង​នឹងយេនឌ័រ/Gender related issue',
        '09' => 'លក្ខខណ្ឌនិងបរិយាកាសនៅមជ្ឈមណ្ឌល/ Center environment/condition'
    ];

    public static $chooses = [

        'មាន/Yes' => 'មាន/Yes' ,
        'គ្មាន/No' => 'គ្មាន/No' , 
        'មិនទាន់មាន/Not yet' => 'មិនទាន់មាន/Not yet' , 
    ];

    public static $abilities = [
      
        'មានសមត្ថភាព/Competent' => 'មានសមត្ថភាព/Competent' ,
        'មានសមត្ថភាពដោយផ្នែក/Partially Competent' => 'មានសមត្ថភាពដោយផ្នែក/Partially Competent' , 
        'គ្មានសមត្ថភាព/Not Competent yet' => 'គ្មានសមត្ថភាព/Not Competent yet' , 
        'កំពុងសិក្សា/Course in progress' => 'កំពុងសិក្សា/Course in progress' ,
        'មិនបានធ្វើតេស្ត/Test not taken' => 'មិនបានធ្វើតេស្ត/Test not taken' ,
    ];

    public static $jobs = [ 

        '1' => 'គ្មានការងារធ្វើ/Unemployed' ,
        '2' => 'មានការងារធ្វើ/Employed' , 
        '3' => 'មុខរបរផ្ទាល់ខ្លួន/Self-employed' , 
    ];

    public static $jobAfters = [ 
        
        'នៅភូមិខ្ញុំ ឬ ឃុំ/My village or commune' => 'នៅភូមិខ្ញុំ ឬ ឃុំ/My village or commune' ,
        'នៅភូមិផ្សេង ឬទីប្រជុំជនខេត្តក្នុងខេត្តរបស់ខ្ញុំ/Other Village/town in my Province' => 'នៅភូមិផ្សេង ឬទីប្រជុំជនខេត្តក្នុងខេត្តរបស់ខ្ញុំ/Other Village/town in my Province' , 
        'នៅក្រៅខេត្ត/Other province' => 'នៅក្រៅខេត្ត/Other province' , 
    ];
}
