<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Datatables;
use App\Film;
use DB;
use Anouar\Fpdf\Fpdf;
class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('reports.index');
    }
    public function detailed($id){
        $data['all']=DB::table('films')->count(DB::raw('DISTINCT id'));
        $data['unrated']=DB::table('films')->where('rated',1)->count(DB::raw('DISTINCT id'));
        $data['rated']=DB::table('films')->where('rated',2)->count(DB::raw('DISTINCT id'));
        $data['declined']=DB::table('films')->where('rated',3)->count(DB::raw('DISTINCT id'));
        $film = Film::find($id);
        $rating=DB::table('ratings')->where('filmID',$id);
        return view('reports.detailed',compact('film','rating','data'));
    }
    public function printDeclinedReport($id){
        $certID = mt_rand(100000, 999999);
        $logo = 'http://www.ku.ac.ke/kutv/wp-content/uploads/2016/06/Kenya-Film-Classification-Board.jpg';
        $films = DB::table('films')->where('id', $id)->get();
//        $films = DB::select('select * from  where id = ?', $id);
        foreach ($films as $film) {
            $filmname= $film->name;
        }
//        var_dump($logo);exit();
        $fpdf = new Fpdf();
        $title = 'Rated Film Certificate';
        $fpdf->SetTitle($title);
        $fpdf->SetAuthor('Jules Verne');
        $fpdf->AddPage("P");
        $fpdf->Rect(5, 5, 200, 287, 'D');
        $fpdf->SetFont('Arial','B',16);
        $fpdf->Image($logo,80,12,40,0,'JPG');
        $fpdf->SetFont('Times', 'B', 14);
        $fpdf->Cell(190, 40, 'KFCB '.$certID, '0', 0, 'R');
        $fpdf->Ln(15);
        $fpdf->SetFont('Times', 'B', 14);
        $fpdf->Cell(200, 40, 'KENYA FILMS AND CLASSIFICATION BOARD', '0', 0, 'C');
        $fpdf->Ln(11);
        $fpdf->SetFont('Times', 'B', 20);
        $fpdf->Cell(200, 40, 'Declined Film Report ', '0', 0, 'C');
        $fpdf->Ln(20);
        $fpdf->SetFont('Times', 'B', 30);



        $fpdf->Ln(10);
        $fpdf->Output();
        exit;
    }
    public function printModeratedReport($id){
        $certID = mt_rand(100000, 999999);
        $logo = 'http://www.ku.ac.ke/kutv/wp-content/uploads/2016/06/Kenya-Film-Classification-Board.jpg';
        $films = DB::table('films')->where('id', $id)->get();
        $params = DB::table('rating_params')
            // ->join('films', 'films.id', '=', 'ratings.filmID')
            ->join('users', 'users.id', '=', 'rating_params.userID')
            ->select('rating_params.name as paramname','rating_params.paramID', 'users.name as username')
            ->where('rating_params.filmID',$id)
            ->orderBy('rating_params.userID', 'asc')
            ->orderBy('rating_params.paramID', 'asc')
            ->get();
        $raters = DB::table('ratings')
            ->join('films', 'films.id', '=', 'ratings.filmID')
            ->join('users', 'users.id', '=', 'ratings.userID')
            ->select('ratings.*', 'users.name as username', 'films.name as filmname')
            ->where('films.id',$id)
            ->get();
        foreach ($films as $film) {
            $filmname= $film->name;
            $rating= $film->rating;
        }
        if($film->rating=='ge'){
            $reportSubtitle="Suitable for general family viewing. Works in this category are suitable for all ages as they contain no content considered harmful or disturbing to even children.";
        }elseif($film->rating=='pg'){
            $reportSubtitle="Parental Guidance is advised. This is an advisory category that warns parents that the content might confuse or upset children who consume it alone. While the content may be suitable for children, parents are advised to monitor the content ";
        }elseif($film->rating=='16'){
            $reportSubtitle="It is a legally restrictive category and no person under the age of 16 years is allowed to consume. Themes may be adult and results are not necessarily positive. ";
        }elseif($film->rating=='18'){
            $reportSubtitle="It is a legally restrictive category and no person under the age of 18 years is allowed to consume. Themes may be adult and results are not necessarily positive. ";
        }elseif($film->rating=='R'){
            $reportSubtitle="It is a legally restrictive category and no person under the age of 21 years is allowed to consume. Themes may be adult and results are not necessarily positive. ";
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

        $fpdf = new Fpdf();
        $title = 'Rated Film Certificate';
        $fpdf->SetTitle($title);
        $fpdf->SetAuthor('Larry Moses');
        $fpdf->AddPage("P");
        $fpdf->AliasNbPages();
        $fpdf->SetFont('Arial','B',16);
        $fpdf->Image($logo,80,12,40,0,'JPG');
        $fpdf->SetFont('Times', 'B', 14);

        $fpdf->Ln(25);
        $fpdf->SetTextColor(90,10,250);
        $fpdf->SetFont('Times', 'B', 14);
        $fpdf->Cell(190, 15, 'KENYA FILMS AND CLASSIFICATION BOARD', '0', 0, 'C');
        $fpdf->Ln(11);
        $fpdf->SetTextColor(220,50,50);
        $fpdf->SetDrawColor(220,50,50);
        $fpdf->Line(10, 56, 210-10, 56);
        $fpdf->Line(10, 81, 210-10, 81);
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(200, 8, 'FILMS RATING REPORT', '0', 0, 'L');
        $fpdf->SetTextColor(0,0,0);
        $fpdf->Ln(11);
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(30, 8, 'Film Title ', '0', 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(70, 8, $filmname, '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(30, 8, 'Director ', '0', 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(70, 8, 'Wafula Wamunyinyi ', '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Ln(8);
        $fpdf->Cell(30, 8, 'Film Type ', '0', 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(70, 8, 'Movie ', '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(30, 8, 'Running Time ', '0', 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(70, 8, "120 ".'Minutes ', '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Ln(8);
        $fpdf->Cell(30, 8, 'Moderator: ', '0', 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(70, 8, 'Redempta Modi '.$rating, '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(30, 8, 'Classified Date: ', '0', 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(70, 8, date('d-M-Y'), '0', 0, 'L');
        $fpdf->Ln(11);
        $fpdf->SetFont('Times', 'BU', 14);
        $fpdf->SetTextColor(10,255,10);
        $fpdf->Cell(30, 8, 'CLASSIFICATION AWARDED', '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->SetTextColor(0,0,0);
        $fpdf->Ln(11);
        if($rating=="pg"){
            $fpdf->Image("http://kfcb.co.ke/wp-content/uploads/2016/08/Artboard-1.png",10,98,30,0,'PNG');
        }elseif ($rating=="ge"){
            $fpdf->Image("http://kfcb.co.ke/wp-content/uploads/2016/08/Artboard-2.png",10,98,30,0,'PNG');
        }elseif ($rating=="16"){
            $fpdf->Image("http://kfcb.co.ke/wp-content/uploads/2016/08/Artboard-3.png",10,98,30,0,'PNG');
        }elseif ($rating=="18"){
            $fpdf->Image("http://kfcb.co.ke/wp-content/uploads/2016/08/Artboard-4.png",10,98,30,0,'PNG');
        }
        $fpdf->Cell(30, 8, '', '0', 0, 'L');
        $fpdf->MultiCell( 70, 5, $reportSubtitle, 0);
        $fpdf->ln(11);
        $fpdf->SetFont('Times', 'BU', 14);
        $fpdf->SetTextColor(1,48,7);
        $fpdf->Cell(30, 8, 'RATING INFORMATION', '0', 0, 'L');
        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('Times', '', 10);
        $fpdf->ln(11);
        $fpdf->setFillColor(64,199,64);
        $fpdf->Cell(45, 8, 'EXAMINER', 'TB', 0, 'L',true);
        $fpdf->Cell(40, 8, 'USER RATING', 'TB', 0, 'C',true);
        $fpdf->Cell(40, 8, 'SYSTEM RATING', 'TB', 0, 'C',true);
        $fpdf->Cell(65, 8, 'JUSTIFICATION', 'TB', 0, 'L',true);
        $fpdf->SetFillColor(198,198,198);
        $fpdf->Ln(8);
        foreach ($raters as $docrow) {
            $fpdf->Cell(45, 8, $docrow->username, '0', 0, 'L',true);
            $fpdf->Cell(40, 8, $docrow->ratescore, '0', 0, 'C',true);
            $fpdf->Cell(40, 8, $docrow->system, '0', 0, 'C',true);
            $fpdf->Cell(65, 8, $docrow->comment, '0', 0, 'L',true);
            $fpdf->Ln(8);
        }
        $fpdf->Ln(8);
        $fpdf->SetFont('Times', 'BU', 14);
        $fpdf->SetTextColor(1,48,7);
        $fpdf->Cell(30, 8, 'PARAMETER FREQUENCY ', '0', 0, 'L');
        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('Times', '', 10);
        $fpdf->ln(11);
        $fpdf->setFillColor(64,199,64);
        $fpdf->Cell(45, 8, 'EXAMINER', 'TB', 0, 'L',true);
        $fpdf->Cell(145, 8, 'PARAMETER', 'TB', 0, 'L',true);
        $fpdf->SetFillColor(198,198,198);
        $fpdf->Ln(8);
        foreach ($params as $docrow) {
            $fpdf->Cell(45, 8, $docrow->username, '0', 0, 'L',true);
            $fpdf->Cell(145, 8, $docrow->paramname, '0', 0, 'L',true);
            $fpdf->Ln(8);
        }
        $fpdf->Ln(8);
        $fpdf->SetFont('Times', 'BU', 14);
        $fpdf->SetTextColor(1,48,7);
        $fpdf->Cell(30, 8, 'OCCURRENCE DISTRIBUTION', '0', 0, 'L');
        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('Times', '', 10);
        $fpdf->ln(11);
        $fpdf->setFillColor(64,199,64);
        $fpdf->Cell(45, 8, 'EXAMINER', 'TB', 0, 'L',true);
        $fpdf->Cell(145, 8, 'PARAMETER', 'TB', 0, 'L',true);
        $fpdf->SetFillColor(198,198,198);
        $fpdf->Ln(8);
        foreach ($params as $docrow) {
            $fpdf->Cell(45, 8, $docrow->username, '0', 0, 'L',true);
            $fpdf->Cell(145, 8, $docrow->paramname, '0', 0, 'L',true);
            $fpdf->Ln(8);
        }
        $fpdf->Ln(8);
        $fpdf->SetFont('Times', 'BU', 14);
        $fpdf->SetTextColor(1,48,7);
        $fpdf->Cell(30, 8, 'RATING INTERPRETATIONS', '0', 0, 'L');
        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetFont('Times', '', 10);
        $fpdf->ln(18);
        $fpdf->Cell(30, 8, '', '0', 0, 'L');
        $fpdf->MultiCell( 160, 5, 'Suitable for general family viewing. Works in this category are suitable for all ages as they contain no content considered harmful or disturbing to even children. ', 0);
        $fpdf->ln(30);
        $fpdf->Cell(30, 8, '', '0', 0, 'L');
        $fpdf->MultiCell( 160, 5,'Parental Guidance is advised. This is an advisory category that warns parents that the content might confuse or upset children who consume it alone. While the content may be suitable for children, parents are advised to monitor the content ', 0);
        $fpdf->ln(30);
        $fpdf->Cell(30, 8, '', '0', 0, 'L');
        $fpdf->MultiCell( 160, 5, 'It is a legally restrictive category and no person under the age of 16 years is allowed to consume. Themes may be adult and results are not necessarily positive.', 0);
        $fpdf->ln(30);
        $fpdf->Cell(30, 8, '', '0', 0, 'L');
        $fpdf->MultiCell( 160, 5, 'It is a legally restrictive category and no person under the age of 18 years is allowed to consume. Themes may be adult and results are not necessarily positive. ', 0);
        $fpdf->ln(30);
        $fpdf->Image("http://kfcb.co.ke/wp-content/uploads/2016/08/Artboard-1.png",10,99,30,0,'PNG');
        $fpdf->Image("http://kfcb.co.ke/wp-content/uploads/2016/08/Artboard-2.png",10,139,30,0,'PNG');
        $fpdf->Image("http://kfcb.co.ke/wp-content/uploads/2016/08/Artboard-3.png",10,179,30,0,'PNG');
        $fpdf->Image("http://kfcb.co.ke/wp-content/uploads/2016/08/Artboard-4.png",10,219,30,0,'PNG');
        $fpdf->Output();
        exit;
    }
    public function getFilmsList()
    {
        $action='<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="'.url("reports/detailed/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">Rating Report</button></li>
                                <li><a href="'.url("certificate/print/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">Film Certificate</button></li>
                                <div class="clearfix"></div>
                                @if($posterrated==1)
                                    <li><a href="'.url("certificate/poster/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">Poster Certificate</button></li>
                                @endif
                          
                            </ul>
                        </div>';
        $films = DB::table('films')->where('rated',2);
        return Datatables::of($films)
            ->editColumn('rated','@if($rated==0)
                                <span class="badge badge-default">Awaiting Rating</span>
                            @elseif($rated==1)
                                <span class="badge badge-primary">Awaiting Moderation</span>
                            @elseif($rated==2)
                                <span class="badge badge-success">Rating Successful</span>
                            @elseif($rated==3)
                                <code class="badge badge-danger">Rectected</code>
                            @endif')
            ->editColumn('poster','@if($poster=="Yes")
                                <span class="badge badge-success">YES</span>
                            @elseif($poster=="No")
                                <span class="badge badge-danger">NO</span>
                            @endif')
            ->editColumn('id',"{{ \$id }}")
            ->addColumn('actions',$action)
            ->make(true);
    }
}
