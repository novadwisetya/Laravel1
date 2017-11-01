<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Controllers\Controller;
use Excel;
use Validator;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MaatwebsiteController extends Controller
{
    public function exportExcel($type, $id)
	{
        $data = Article::find($id)->toArray();
        return Excel::create('myArticle', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
    }
    
	public function importExcel(Request $request)
	{
		$this->validate($request, [
						'import_file' => 'required|mimes:xlsx, xls'
					]);
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
                    Article::create(['title' => $value->title, 'content' => $value->content]);
                    // $insert[] = ['title' => $value->title, 'content' => $value->content, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()];
				}
			}
		}
		return back();
	}
}
