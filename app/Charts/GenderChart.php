<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class GenderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $kelaminSiswa = siswa::get();
        $data =[
            $kelaminSiswa->where('id_jeniskelamin',1)->count(),
            $kelaminSiswa->where('id_jeniskelamin',2)->count()
        ];
        $kelaminLabel =[
            'Laki-Laki',
            'Perempuan'
        ];

        return $this->chart->pieChart()
            ->setTitle('jenis kelamin siswa')
            // ->setSubtitle('Season 2021.')
            ->addData($data)
            ->setLabels($kelaminLabel);
    }
}
