<?php

namespace App\Exports;

use App\Models\questioner;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;


class KuesionerExport implements FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     // return questioner::all();

    // }
    protected $tahun;
    protected $univ;
    protected $prodi;

    function __construct($tahun, $univ, $prodi)
    {
        $this->tahun = $tahun;
        $this->univ = $univ;
        $this->prodi = $prodi;
    }

    public function array(): array
    {
        $data =
            DB::table('questioners')
            ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
            ->join('questionersduas', 'questionersduas.id_questioners', '=', 'questioners.id')
            ->join('questionerstigas', 'questionerstigas.id_questioners', '=', 'questioners.id')
            ->join('questionersempats', 'questionersempats.id_questioners', '=', 'questioners.id')
            ->select(
                'questioners.kdptimsmh',
                'questioners.kdpstmsmh',
                'questioners.nimhsmsmh',
                'questioners.nmmhsmsmh',
                'questioners.telpomsmh',
                'questioners.emailmsmh',
                'questioners.tahun_lulus',
                'questioners.nik',
                'questioners.npwp',
                'questionersatus.f8',
                'questionersatus.f504',
                'questionersatus.f502',
                'questionersatus.f505',
                'questionersatus.f506',
                'questionersatus.f5a1',
                'questionersatus.f5a2',
                'questionersatus.f1101',
                'questionersatus.f1102',
                'questionersatus.f5b',
                'questionersatus.f5c',
                'questionersatus.f5d',
                'questionersatus.f18a',
                'questionersatus.f18b',
                'questionersatus.f18c',
                'questionersatus.f18d',
                'questionersatus.f1201',
                'questionersatus.f1202',
                'questionersatus.f14',
                'questionersatus.f15',
                'questionersduas.f1761',
                'questionersduas.f1762',
                'questionersduas.f1763',
                'questionersduas.f1764',
                'questionersduas.f1765',
                'questionersduas.f1766',
                'questionersduas.f1767',
                'questionersduas.f1768',
                'questionersduas.f1769',
                'questionersduas.f1770',
                'questionersduas.f1771',
                'questionersduas.f1772',
                'questionersduas.f1773',
                'questionersduas.f1774',
                'questionerstigas.f21',
                'questionerstigas.f22',
                'questionerstigas.f23',
                'questionerstigas.f24',
                'questionerstigas.f25',
                'questionerstigas.f26',
                'questionerstigas.f27',
                'questionerstigas.f301',
                'questionerstigas.f302',
                'questionerstigas.f303',
                'questionerstigas.f401',
                'questionerstigas.f1402',
                'questionerstigas.f403',
                'questionerstigas.f404',
                'questionerstigas.f405',
                'questionerstigas.f406',
                'questionerstigas.f407',
                'questionerstigas.f408',
                'questionerstigas.f409',
                'questionerstigas.f410',
                'questionerstigas.f411',
                'questionerstigas.f412',
                'questionerstigas.f413',
                'questionerstigas.f414',
                'questionerstigas.f415',
                'questionerstigas.f416',
                'questionersempats.f6',
                'questionersempats.f7',
                'questionersempats.f7a',
                'questionersempats.f1001',
                'questionersempats.f1002',
                'questionersempats.f1601',
                'questionersempats.f1602',
                'questionersempats.f1603',
                'questionersempats.f1604',
                'questionersempats.f1605',
                'questionersempats.f1606',
                'questionersempats.f1607',
                'questionersempats.f1608',
                'questionersempats.f1609',
                'questionersempats.f1610',
                'questionersempats.f1611',
                'questionersempats.f1612',
                'questionersempats.f1613',
                'questionersempats.f1614',
            );
        if ($this->tahun != "" || $this->univ != "" || $this->prodi != "") {
            if ($this->univ != "" && $this->prodi != "" && $this->tahun != "") {
                $data = $data->where('kdptimsmh', '=', $this->univ)->where('kdpstmsmh', '=', $this->prodi)->where('tahun_lulus', '=', $this->tahun)->get()->toArray();
            } else if ($this->univ != "" && $this->prodi != "") {
                $data = $data->where('kdptimsmh', '=', $this->univ)->where('kdpstmsmh', '=', $this->prodi)->get()->toArray();
            } else if ($this->univ != "" && $this->tahun != "") {
                $data = $data->where('kdptimsmh', '=', $this->univ)->where('tahun_lulus', '=', $this->tahun)->get()->toArray();
            } else if ($this->univ != "") {
                $data = $data->where('kdptimsmh', '=', $this->univ)->get()->toArray();
            } else if ($this->prodi != "") {
                $data = $data->where('kdpstmsmh', '=', $this->prodi)->get()->toArray();
            } else {
                $data = $data->where('tahun_lulus', '=', $this->tahun)->get()->toArray();
            }
        } else {
            $data = $data->get()->toArray();
        }



        $data_array[] = array(
            'kdptimsmh', 'kdpstmsmh', 'nimhsmsmh', 'nmmhsmsmh', 'telpomsmh', 'emailmsmh', 'tahun_lulus', 'nik', 'npwp', 'f8', 'f504', 'f502', 'f505', 'f506', 'f5a1', 'f5a2', 'f1101', 'f1102', 'f5b', 'f5c', 'f5d', 'f18a', 'f18b', 'f18c', 'f18d', 'f1201', 'f1202', 'f14', 'f15', 'f1761', 'f1762', 'f1763', 'f1764', 'f1765', 'f1766', 'f1767', 'f1768', 'f1769', 'f1770', 'f1771', 'f1772', 'f1773', 'f1774', 'f21', 'f22', 'f23', 'f24', 'f25', 'f26', 'f27', 'f301', 'f302', 'f303', 'f401', 'f1402', 'f403', 'f404', 'f405', 'f406', 'f407', 'f408', 'f409', 'f410', 'f411', 'f412', 'f413', 'f414', 'f415', 'f416', 'f6', 'f7', 'f7a', 'f1001', 'f1002', 'f1601', 'f1602', 'f1603', 'f1604', 'f1605', 'f1606', 'f1607', 'f1608', 'f1609', 'f1610', 'f1611', 'f1612', 'f1613', 'f1614'
        );

        foreach ($data as $d) {
            $data_array[] = array(
                'kdptimsmh' => $d->kdptimsmh,
                'kdpstmsmh' => $d->kdpstmsmh,
                'nimhsmsmh' => $d->nimhsmsmh,
                'nmmhsmsmh' => $d->nmmhsmsmh,
                'telpomsmh' => $d->telpomsmh,
                'emailmsmh' => $d->emailmsmh,
                'tahun_lulus' => $d->tahun_lulus,
                'nik' =>  $d->nik,
                'npwp' => $d->npwp,
                'f8' => $d->f8,
                'f504' => $d->f504,
                'f502' => $d->f502,
                'f505' => $d->f505,
                'f506' => $d->f506,
                'f5a1' => $d->f5a1,
                'f5a2' => $d->f5a2,
                'f1101' => $d->f1101,
                'f1102' => $d->f1102,
                'f5b' => $d->f5b,
                'f5c' => $d->f5c,
                'f5d' => $d->f5d,
                'f18a' => $d->f18a,
                'f18b' => $d->f18b,
                'f18c' => $d->f18c,
                'f18d' => $d->f18d,
                'f1201' => $d->f1201,
                'f1202' => $d->f1202,
                'f14' => $d->f14,
                'f15' => $d->f15,
                'f1761' => $d->f1761,
                'f1762' => $d->f1762,
                'f1763' => $d->f1763,
                'f1764' => $d->f1764,
                'f1765' => $d->f1765,
                'f1766' => $d->f1766,
                'f1767' => $d->f1767,
                'f1768' => $d->f1768,
                'f1769' => $d->f1769,
                'f1770' => $d->f1770,
                'f1771' => $d->f1771,
                'f1772' => $d->f1772,
                'f1773' => $d->f1773,
                'f1774' => $d->f1774,
                'f21' => $d->f21,
                'f22' => $d->f22,
                'f23' => $d->f23,
                'f24' => $d->f24,
                'f25' => $d->f25,
                'f26' => $d->f26,
                'f27' => $d->f27,
                'f301' => $d->f301,
                'f302' => $d->f302,
                'f303' => $d->f303,
                'f401' => $d->f401,
                'f1402' => $d->f1402,
                'f403' => $d->f403,
                'f404' => $d->f404,
                'f405' => $d->f405,
                'f406' => $d->f406,
                'f407' => $d->f407,
                'f408' => $d->f408,
                'f409' => $d->f409,
                'f410' => $d->f410,
                'f411' => $d->f411,
                'f412' => $d->f412,
                'f413' => $d->f413,
                'f414' => $d->f414,
                'f415' => $d->f415,
                'f416' => $d->f416,
                'f6' => $d->f6,
                'f7' => $d->f7,
                'f7a' => $d->f7a,
                'f1001' => $d->f1001,
                'f1002' => $d->f1002,
                'f1601' => $d->f1601,
                'f1602' => $d->f1602,
                'f1603' => $d->f1603,
                'f1604' => $d->f1604,
                'f1605' => $d->f1605,
                'f1606' => $d->f1606,
                'f1607' => $d->f1607,
                'f1608' => $d->f1608,
                'f1609' => $d->f1609,
                'f1610' => $d->f1610,
                'f1611' => $d->f1611,
                'f1612' => $d->f1612,
                'f1613' => $d->f1613,
                'f1614' => $d->f1614

            );
        }
        return $data_array;
    }
}
