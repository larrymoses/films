<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
USE Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Datatables;
use App\Film;
use Anouar\Fpdf\Fpdf;
use Auth;
class RatedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('moderator.rated');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getFilmsList()
    {
        $films = DB::table('films')->where('rated',2);
        $action='<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li>
                                <a href="'.url("certificate/print/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">View Certificate</button>
                                </li>
                                <li>
                                <a href="'.url("/moderated/report/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">View Report</button>
                                </li>
                                <li>
                                <a href="'.url("reviewrate/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">Review Ratings</button>
                                </li>
                                
                            </ul>
                        </div>';

        return Datatables::of($films)
            ->editColumn('id',"{{ \$id }}")
            ->addColumn('actions',$action)
            ->make(true);
    }

    public function printCertificate($id)
    {
//        $logo = asset('/img/logo/download.jpg');
        $certID = mt_rand(100000, 999999);
//        $logo = asset('assets/layouts/layout2/img/logo-big.jpg');
        $logo = 'http://www.ku.ac.ke/kutv/wp-content/uploads/2016/06/Kenya-Film-Classification-Board.jpg';
        $films = DB::table('films')->where('id', $id)->get();
//        $users = DB::select('select * from  where id = ?', $id);
        foreach ($films as $film) {
            $filmname= $film->name;
            $rate= $film->rating;
        }
//        var_dump($logo);exit();
        $fpdf = new Fpdf();
        $title = 'Rated Film Certificate';
        $fpdf->SetTitle($title);
        $fpdf->SetAuthor('Larry Moses');
        $fpdf->AddPage("P");

        $fpdf->Rect(5, 5, 200, 287, 'D');
        $fpdf->setFillColor(230,230,230);
        $fpdf->Image($logo,80,12,40,0,'JPG');

        $fpdf->SetFont('Times', '', 11);
        $fpdf->Cell(190, 12, 'Licence No AP-001380', '0', 0, 'R');
        $fpdf->Ln(25);
        $fpdf->SetFont('Times', 'B', 14);
        $fpdf->Cell(190, 15, 'KENYA FILM AND CLASSIFICATION BOARD', '0', 0, 'C');
        $fpdf->Ln(11);
        $fpdf->SetFont('Times', '', 10);
        $fpdf->Cell(50, 10, 'When replying quote', '0', 0, 'L');
        $fpdf->Ln(4);
        $fpdf->Cell(50, 10, 'Telephone Nairobi - (020) 2250600/2241804', '0', 0, 'L');
        $fpdf->Ln(4);
        $fpdf->Cell(50, 10, 'Fax: 2251258', '0', 0, 'L');
        $fpdf->Ln(4);
        $fpdf->Cell(50, 10, 'www.kfcb.co.ke', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->SetFont('Times', 'B', 25);
        $fpdf->Cell(190, 15, 'CERTIFICATE OF APPROVAL OF FILM', '0', 0, 'C');
        $fpdf->Ln(10);
        $fpdf->SetFont('Times', 'B', 16);
        $fpdf->Cell(190, 15, 'Valid for five years from date of issue', '0', 0, 'C');
        $fpdf->Ln(12);
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(190, 12, 'IN PURSUANCE of section 16(5) of the Films and Stage Plays Act, the Kenya Film Classification Board', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(90, 12, 'hereby certify that it has examined the film called: ', '0', 0, 'L');
        $fpdf->SetFont('Times', 'BI', 12);
        $fpdf->Cell(100, 12,'..........'.$filmname.'....', '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Ln(10);
        $fpdf->Cell(90, 12, 'and has-- ', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(180, 12, 'Approved it for exhibition to the public.', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(180, 12, 'Approved it for exhibition to the public subject to the following excision as it thinks Proper--', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(180, 12, '...............'.strtoupper($rate).'...................................', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(180, 12, '.....................................................................................................', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(100, 12, 'Approved it for exhibition to .....................................', '0', 0, 'L');
        $fpdf->SetFont('Times', 'I', 12);
        $fpdf->Cell(80, 12, '(Persons by whom it may be exhibited)', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(190, 12, 'HOWEVER, the Board considered that the film was unsuitable for general exhibition,', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(90, 12, 'and ruled as follows:- ', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(180, 12, 'For adults only.', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(1100, 12, 'Unsuitable for children under the age of sixteen years.', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(180, 12, 'Unsuitable for children under the age of ten.', '0', 0, 'L');
        $fpdf->Ln(19);
        $fpdf->SetFont('Times', 'B', 14);
        $fpdf->Cell(20, 12, 'Dated', '0', 0, 'L');
        $fpdf->SetFont('Times', 'IB', 12);
        $fpdf->Cell(160, 12, 'Thursday 9th of August 2016', '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Ln(10);
        $fpdf->Cell(190, 12, 'By the order of Kenya Film Classification Board', '0', 0, 'L');
        $fpdf->Ln(15);
        $fpdf->SetFont('Times', 'B', 10);
        $fpdf->Cell(190, 12, '.......................................................', '0', 0, 'C');
        $fpdf->Ln(5);
        $fpdf->Cell(190, 12, 'SECRETARY/CEO', '0', 0, 'C');
        $fpdf->Ln(5);
        $fpdf->Cell(190, 12, 'KENYA FILM CLASSIFICATION BOARD', '0', 0, 'C');
        $fpdf->Ln(5);
        $fpdf->Output();
        exit;
    }
    public function posterCertificate($id)
    {

//        $logo = asset('/img/logo/download.jpg');
        $certID = mt_rand(100000, 999999);
//        $logo = asset('assets/layouts/layout2/img/logo-big.jpg');
        $logo = 'http://www.ku.ac.ke/kutv/wp-content/uploads/2016/06/Kenya-Film-Classification-Board.jpg';
        $films = DB::table('films')->where('id', $id)->get();
//        $users = DB::select('select * from  where id = ?', $id);
        foreach ($films as $film) {

//        var_dump($logo);exit();
        $fpdf = new Fpdf();
        $title = 'Rated Film Certificate';
        $fpdf->SetTitle($title);
        $fpdf->SetAuthor('Larry Moses');
        $fpdf->AddPage("P");

        $fpdf->Rect(5, 5, 200, 287, 'D');
        $fpdf->setFillColor(230,230,230);
        $fpdf->Image($logo,80,12,40,0,'JPG');

        $fpdf->SetFont('Times', '', 11);
        $fpdf->Cell(190, 12, 'Licence No AP-001380', '0', 0, 'R');
        $fpdf->Ln(25);
        $fpdf->SetFont('Times', 'B', 14);
        $fpdf->Cell(190, 15, 'KENYA FILM AND CLASSIFICATION BOARD', '0', 0, 'C');
        $fpdf->Ln(11);
        $fpdf->SetFont('Times', '', 10);
        $fpdf->Cell(50, 10, 'When replying quote', '0', 0, 'L');
        $fpdf->Ln(4);
        $fpdf->Cell(50, 10, 'Telephone Nairobi - (020) 2250600/2241804', '0', 0, 'L');
        $fpdf->Ln(4);
        $fpdf->Cell(50, 10, 'Fax: 2251258', '0', 0, 'L');
        $fpdf->Ln(4);
        $fpdf->Cell(50, 10, 'www.kfcb.co.ke', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->SetFont('Times', 'B', 25);
        $fpdf->Cell(190, 15, 'APPROVAL OF FILM OR', '0', 0, 'C');
        $fpdf->Ln(10);
        $fpdf->Cell(190, 15, 'DESCRIPTION OF POSTER', '0', 0, 'C');
        $fpdf->Ln(10);
        $fpdf->SetFont('Times', 'B', 16);
        $fpdf->Cell(190, 15, 'Valid for five years from date of issue', '0', 0, 'C');
        $fpdf->Ln(12);
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(190, 12, 'IN PURSUANCE of section 16(5) of the Films and Stage Plays Act, the Kenya Film Classification Board', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(90, 12, 'hereby certify that it has examined the film called: ', '0', 0, 'L');
        $fpdf->SetFont('Times', 'BI', 12);
        $fpdf->Cell(100, 12,'..........'.$film->name.'....', '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Ln(10);
        $fpdf->Cell(90, 12, 'and has-- ', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(190, 12, 'Approved it for exhibition to the public.', '0', 0, 'L');
        $fpdf->Ln(10);
            $fpdf->SetFont('Times', 'B', 12);
        $fpdf->Cell(190, 12, '..............'.strtoupper($film->posterRate).'.................', '0', 0, 'L');
            $fpdf->SetFont('Times', '', 12);
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(180, 12, 'Approved it for exhibition to the public subject to the following excision as it thinks Proper--', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(100, 12, 'Approved it for exhibition to .....................................', '0', 0, 'L');
        $fpdf->SetFont('Times', 'I', 12);
        $fpdf->Cell(80, 12, '(Persons by whom it may be exhibited)', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Cell(190, 12, 'HOWEVER, the Board considered that the film was unsuitable for general exhibition,', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(90, 12, 'and ruled as follows:- ', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(180, 12, 'For adults only.', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(1100, 12, 'Unsuitable for children under the age of sixteen years.', '0', 0, 'L');
        $fpdf->Ln(10);
        $fpdf->Cell(10, 12, '', '0', 0, 'L');
        $fpdf->Cell(180, 12, 'Unsuitable for children under the age of ten.', '0', 0, 'L');
        $fpdf->Ln(19);
        $fpdf->SetFont('Times', 'B', 14);
        $fpdf->Cell(20, 12, 'Dated', '0', 0, 'L');
        $fpdf->SetFont('Times', 'IB', 12);
        $fpdf->Cell(160, 12, 'Thursday 9th of August 2016', '0', 0, 'L');
        $fpdf->SetFont('Times', '', 12);
        $fpdf->Ln(10);
        $fpdf->Cell(190, 12, 'By the order of Kenya Film Classification Board', '0', 0, 'L');
        $fpdf->Ln(15);
        $fpdf->SetFont('Times', 'B', 10);
        $fpdf->Cell(190, 12, '.......................................................', '0', 0, 'C');
        $fpdf->Ln(5);
        $fpdf->Cell(190, 12, 'SECRETARY/CEO', '0', 0, 'C');
        $fpdf->Ln(5);
        $fpdf->Cell(190, 12, 'KENYA FILM CLASSIFICATION BOARD', '0', 0, 'C');
        $fpdf->Ln(5);
        $fpdf->Output();
        exit;
    }
    }
}
