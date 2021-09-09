<?php
if(isset($_FILES['xlsapk'])){
            $this->load->library('upload');
            $nmfile = time();
            $config['upload_path'] = './aplod/';
            $config['allowed_types'] = 'xlsx';
            $config['max_size'] = 1024 * 20;
            $config['file_name'] = 'sapk.xlsx';
            $this->upload->initialize($config);

            if ($_FILES['xlsapk']['name']) {
                if ($this->upload->do_upload('xlsapk')) {
                    $excelreader = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('aplod/sapk.xlsx');
                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
                    foreach($sheet as $row){
                        $data = array(
                             'NO'                      => $row['A'],
                             'PNS_ID'                  => $row['B'] == '' ? '' : $row['B'],
                             'NIP_BARU'                => $row['C'] == '' ? '' : $row['C'],
                             'NIP_LAMA'                => $row['D'] == '' ? '' : $row['D'],
                             'NAMA'                    => $row['E'] == '' ? '' : $row['E'],
                             'GELAR_DEPAN'             => $row['F'] == '' ? '' : $row['F'],
                             'GELAR_BLK'               => $row['G'] == '' ? '' : $row['G'],
                             'TEMPAT_LAHIR_ID'         => $row['H'] == '' ? '' : $row['H'],
                             'TEMPAT_LAHIR_NAMA'       => $row['I'] == '' ? '' : $row['I'],
                             'TGL_LAHIR'               => $row['J'] == '' ? '' : $row['J'],
                             'JENIS_KELAMIN'           => $row['K'] == '' ? '' : $row['K'],
                             'AGAMA_ID'                => $row['L'] == '' ? '' : $row['L'],
                             'AGAMA_NAMA'              => $row['M'] == '' ? '' : $row['M'],
                             'JENIS_KAWIN_ID'          => $row['N'] == '' ? '' : $row['N'],
                             'JENIS_KAWIN_NAMA'        => $row['O'] == '' ? '' : $row['O'],
                             'NIK'                     => $row['P'] == '' ? '' : $row['P'],
                             'NOMOR_HP'                => $row['Q'] == '' ? '' : $row['Q'],
                             'EMAIL'                   => $row['R'] == '' ? '' : $row['R'],
                             'ALAMAT'                  => $row['S'] == '' ? '' : $row['S'],
                             'NPWP_NOMOR'              => $row['T'] == '' ? '' : $row['T'],
                             'BPJS'                    => $row['U'] == '' ? '' : $row['U'],
                             'JENIS_PEGAWAI_ID'        => $row['V'] == '' ? '' : $row['V'],
                             'JENIS_PEGAWAI_NAMA'      => $row['W'] == '' ? '' : $row['W'],
                             'KEDUDUKAN_HUKUM_ID'      => $row['X'] == '' ? '' : $row['X'],
                             'KEDUDUKAN_HUKUM_NAMA'    => $row['Y'] == '' ? '' : $row['Y'],
                             'STATUS_CPNS_PNS'         => $row['Z'] == '' ? '' : $row['Z'],
                             'KARTU_PEGAWAI'           => $row['AA'] == '' ? '' : $row['AA'],
                             'NOMOR_SK_CPNS'           => $row['AB'] == '' ? '' : $row['AB'],
                             'TGL_SK_CPNS'             => $row['AC'] == '' ? '' : $row['AC'],
                             'TMT_CPNS'                => $row['AD'] == '' ? '' : $row['AD'],
                             'NOMOR_SK_PNS'            => $row['AE'] == '' ? '' : $row['AE'],
                             'TGL_SK_PNS'              => $row['AF'] == '' ? '' : $row['AF'],
                             'TMT_PNS'                 => $row['AG'] == '' ? '' : $row['AG'],
                             'GOL_AWAL_ID'             => $row['AH'] == '' ? '' : $row['AH'],
                             'GOL_AWAL_NAMA'           => $row['AI'] == '' ? '' : $row['AI'],
                             'GOL_ID'                  => $row['AJ'] == '' ? '' : $row['AJ'],
                             'GOL_NAMA'                => $row['AK'] == '' ? '' : $row['AK'],
                             'TMT_GOLONGAN'            => $row['AL'] == '' ? '' : $row['AL'],
                             'MK_TAHUN'                => $row['AM'] == '' ? '' : $row['AM'],
                             'MK_BULAN'                => $row['AN'] == '' ? '' : $row['AN'],
                             'JENIS_JABATAN_ID'        => $row['AO'] == '' ? '' : $row['AO'],
                             'JENIS_JABATAN_NAMA'      => $row['AP'] == '' ? '' : $row['AP'],
                             'JABATAN_ID'              => $row['AQ'] == '' ? '' : $row['AQ'],
                             'JABATAN_NAMA'            => $row['AR'] == '' ? '' : $row['AR'],
                             'TMT_JABATAN'             => $row['AS'] == '' ? '' : $row['AS'],
                             'TINGKAT_PENDIDIKAN_ID'   => $row['AT'] == '' ? '' : $row['AT'],
                             'TINGKAT_PENDIDIKAN_NAMA' => $row['AU'] == '' ? '' : $row['AU'],
                             'PENDIDIKAN_ID'           => $row['AV'] == '' ? '' : $row['AV'],
                             'PENDIDIKAN_NAMA'         => $row['AW'] == '' ? '' : $row['AW'],
                             'TAHUN_LULUS'             => $row['AX'] == '' ? '' : $row['AX'],
                             'KPKN_ID'                 => $row['AY'] == '' ? '' : $row['AY'],
                             'KPKN_NAMA'               => $row['AZ'] == '' ? '' : $row['AZ'],
                             'LOKASI_KERJA_ID'         => $row['BA'] == '' ? '' : $row['BA'],
                             'LOKASI_KERJA_NAMA'       => $row['BB'] == '' ? '' : $row['BB'],
                             'UNOR_ID'                 => $row['BC'] == '' ? '' : $row['BC'],
                             'UNOR_NAMA'               => $row['BD'] == '' ? '' : $row['BD'],
                             'UNOR_INDUK_ID'           => $row['BE'] == '' ? '' : $row['BE'],
                             'UNOR_INDUK_NAMA'         => $row['BF'] == '' ? '' : $row['BF'],
                             'INSTANSI_INDUK_ID'       => $row['BG'] == '' ? '' : $row['BG'],
                             'INSTANSI_INDUK_NAMA'     => $row['BH'] == '' ? '' : $row['BH'],
                             'INSTANSI_KERJA_ID'       => $row['BI'] == '' ? '' : $row['BI'],
                             'INSTANSI_KERJA_NAMA'     => $row['BJ'] == '' ? '' : $row['BJ'],
                             'SATUAN_KERJA_INDUK_ID'   => $row['BK'] == '' ? '' : $row['BK'],
                             'SATUAN_KERJA_INDUK_NAMA' => $row['BL'] == '' ? '' : $row['BL'],
                             'SATUAN_KERJA_KERJA_ID'   => $row['BM'] == '' ? '' : $row['BM'],
                             'SATUAN_KERJA_KERJA_NAMA' => $row['BN'] == '' ? '' : $row['BN']
                         );
                        $insert_rekon = $this->Mpegawai->save($data,'rekon');
                    }
                }
            }
            
            $msg['oke'] = TRUE;
            echo json_encode($msg);
        }
?>