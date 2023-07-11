<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Calculator;
use Illuminate\Support\Facades\DB;

class CalculatorController extends Controller
{
     /**
     * Form method will show the form page from view
     */
    public function form()
    {
        return view('calculator.form');
    }

    /**
     * Result method will perform the operations
     * evaluate the result and then send the data to view
     */
    public function result()
    {
        // capture all data from the request
        $a = request()->get('a');
        $b = request()->get('b');
        $opr = request()->get('opr');
        $result = null;



        // process the requested operation (business logic)
        if ($opr == 'add')
            $result = $a + $b;
        else if ($opr == 'sub')
            $result = $a - $b;
        else if ($opr == 'mul')
            $result = $a * $b;

        // save this data in database table
        $calc = new Calculator(); // create model object
        $calc->a = $a;
        $calc->b = $b;
        $calc->opr = $opr;
        $calc->result = $result;
        $calc->save(); 
        // save the record to table

        return view('calculator.result')
            ->with('result',$result)
            ->with('a', $a)
            ->with('b', $b)
            ->with('opr', $opr);
    }


    public function logs()
{
    $calc=new  calculator();
    $data=$calc->all();
    foreach($data as $d)
    {
        /*
        echo $d->id." - ";
        echo $d->a." - ";
        echo $d->b." - ";
        echo $d->opr." - ";
        echo $d->result." - ";
        echo $d->created_at." - ";
        echo $d->updated_at." - ";
        echo"<br><br>";
        */
        return view('calculator.logs')->with('data',$data);

    }
}

    /*
     * This method is used for listing the records based on queriesfrom db table
     * filter = all --> list all data
     * filter =first --> Display first record
     * filter =last --> display last record
     * filter =top , values =3 display first three records 
     * filter = reverse --> display values in reverse order
     * 
     */
    
    

    public function queries()
    {
        $calc=new  calculator();
        $filter =request()->get('filter');
        $value =request()->get('value');
     
    //to get all records with some condition on where

    if($filter=='all')
    {
        $data =$calc->all();
        echo "All Records"." : ".$data->count()."<br><br>";
 
    foreach($data as $d){
        echo"id - " .$d->id ."< || >";
        echo"a - " .$d->a  ."< || >";
        echo"b - " .$d->b ."< || >";
        echo"opr - " .$d->opr ."< || >";
        echo"created-at - " .$d->created_at ."<br><br>";

    }
    }
    // to get first record 
    if($filter == 'first'){
        echo "first record"."<br><br>";
    $d=$calc->where('created_at','<=','2023-07-04 12:26:27')->where('opr','sub')->first();
    
        echo"id - " .$d->id ."<br>";
        echo"a - " .$d->a  ."<br>";
        echo"b - " .$d->b ."<br>";
        echo"opr - " .$d->opr ."<br>";
        echo"created-at - " .$d->created_at ."<br><br>";

    
    }

       // this will return Last record 
       if($filter == 'last'){
        echo "Last record"."<br><br>";
    $d=$calc->orderby('id','desc')->first();
    
        echo"id - " .$d->id ."<br>";
        echo"a - " .$d->a  ."<br>";
        echo"b - " .$d->b ."<br>";
        echo"opr - " .$d->opr ."<br>";
        echo"created-at - " .$d->created_at ."<br><br>";

    
    }


    // this will return top 3  records
    
    if($filter=='top3')
    {
        $data =$calc->limit(5)->get();
        echo "Top3 Records"." : ".$data->count()."<br><br>";
 
    foreach($data as $d){
        echo"id - " .$d->id ."< || >";
        echo"a - " .$d->a  ."< || >";
        echo"b - " .$d->b ."< || >";
        echo"opr - " .$d->opr ."< || >";
        echo"created-at - " .$d->created_at ."<br><br>";

    }
    }

    
    if($filter=='reverse')
    {            
        $data=$calc->orderby('id','desc')->get();
        echo "All Records"." : ".$data->count()."<br><br>";
 
    foreach($data as $d){
        echo"id - " .$d->id ."< || >";
        echo"a - " .$d->a  ."< || >";
        echo"b - " .$d->b ."< || >";
        echo"opr - " .$d->opr ."< || >";
        echo"created-at - " .$d->created_at ."<br><br>";

    }
    }

     // Aggregate functions

     /*
     if($filter =='add'){
        $data =$calc->sum('a');
        dd($data);
     }
          
     */
    if($filter =='a'){
       if($value=='sum'){
        $data=$calc->sum('result');
       }
       if($value=='min'){
        $data=$calc->min('result');
       }
       if($value=='max'){
        $data=$calc->max('result');
       }
       if($value=='avg'){
        $data=$calc->avg('result');
       }
     
     
     echo "Filter : column (".$filter.") value : operation   (".$value." )    Result  :".$data;

    }


        /*sql queries 
        _______________

        pluck => for Retrives column data
        

*/
          if($filter =='pluck'){
          $data=$calc->pluck($value);
          dd($data);
          }
     
          //group by querie
          if($filter=='groupby'){
            $data=$calc->get()->groupby('opr');
            dd($data);
          }

      
    }
    


    /*
Show method  will display one record based on id
    */
public function show($id){


    $alert =request()->session()->get('alert');
    /*
$record= DB::table('calculators')->where('id',$id)->first();
$record =DB::table('calculators')->find($id);
$record =DB::table('calculators')->find($id);
dd($record);
*/

//       model
$record =Calculator::find($id);
return view('calculator.show')->with('data',$record)->with('alert',$alert);
}


/*
api method will return one record without view or design based on id 

*/

public function api($id){


    $alert =request()->session()->get('alert');
    /*
$record= DB::table('calculators')->where('id',$id)->first();
$record =DB::table('calculators')->find($id);
$record =DB::table('calculators')->find($id);
dd($record);
*/

//       model
$record =Calculator::find($id);
return $record;
}
 /*
 update method will pull the record from database and 
 shows it to user from the form page
 */
public function update($id)
{

$record=calculator::find($id);
//return view('calculator.show')->with('data',$record)->with('alert',$alert);
return view('calculator.update')->with('data',$record);

}


/*
Savedata method  will put the updated values in database
*/
public function savedata($id)
{
    $record=calculator::find($id);
   $record->a=request()->get('a');
   $record->b=request()->get('b');
   $record->opr=request()->get('opr');
//dd(request()->all());
if(request()->get('opr')=='add')
$record->result=$record->a + $record->b;
else if(request()->get('opr')=='sub')
$record->result=$record->a - $record->b;
else if(request()->get('opr')=='mul')
$record->result=$record->a * $record->b;
$record->save();
//dd($record);
//<input type ="hidden " name ="_token" value ="{{{_token()}}";
$alert ="You have successfully updated the record(" .$record->id. ")";
return redirect()->to('calculator/show/'.$id)
->with('alert',$alert);
} 


/*
method to delete a record from database
*/

public function destroy($id)
{
$record =Calculator::find($id);
if($record)
$record->delete();
return redirect()->to("{{route('calc.logs')}}");
}
}




/*
<form action ="/calculator/destroy/{{$d->id}}" method ="post">
                              <button type ="submit" class ="btn btn-danger mb-2">delete</button>  
                              @csrf
                     </form>
                     */