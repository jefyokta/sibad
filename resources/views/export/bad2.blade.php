<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <td colspan="12">BEBAN AKADEMIK DOSEN TETAP</td>
            </tr>
            <tr>

                <td colspan="12">PROGRAM STUDI SISTEM INFORMASI FAKULTAS SAINS DAN TEKNOLOGI</td>
            </tr>
            <tr>

                <td colspan="12">SEMESTER {{ $semester->is_odd ? 'GANJIL' : 'GENAP' }} TAHUN AKADEMIK
                    {{ Date::parse($semester->begin)->year }}/{{ Date::parse($semester->end)->year }}
                </td>
            </tr>

        </thead>
    </table>
    <table border="1px">
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">NAMA DOSEN</th>
                <th rowspan="2">GOL/PGKT</th>
                <th rowspan="2">TUGAS LAIN</th>
                <th rowspan="2">SKS</th>
                <th colspan="3">
                    BEBAN AKADEMIK DOSEN
                </th>
                <th colspan="1">JML</th>
                <th rowspan="2">JML SKS</th>
                <th colspan="1">TOTAL</th>
                <th rowspan="2">KELEBIHAN</th>
            </tr>
            <tr>
                <th>MATAKULIAH</th>
                <th>PRO/SMT/KLS</th>
                <th>SKS</th>
                <th>JML KELAS</th>
                <th>BAD</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1;
            @endphp
            @foreach ($lecturers as $l)
                @php
                    $bads = \App\Models\Bad::select('*')
                        ->where('lecturer_id', $l->id)
                        ->where('semester_id', $semester->id);
                    $courses = $bads->get();
                    $rows=$bads->count();
                    $count = 0;
                    foreach ($courses as $c) {
                        $count += $c->course->sks;
                    }
                    $count += $l->otherjob->sks ?? 0;
                    $courses = $bads->get();
                @endphp
                <tr>
                    <td rowspan="{{ $rows > 2 ? $rows : 2 }}">{{ $index++ }}</td>
                    <td>{{ $l->name }}</td>
                    <td>{{ $l->gol }}</td>
                    <td>{{ $l->otherjob->name ?? '' }}</td>
                    <td>{{ $l->otherjob->sks ?? '' }}</td>
                    @php
                        $firstCourse = $courses[0]->course ?? null;
                    @endphp
                    <td>{{ $firstCourse->name ?? '' }}</td>
                    <td>
                        @if ($firstCourse)
                            {{ $firstCourse->studyprogram ?? '' }}/{{ $firstCourse->semester ?? '' }}/{{ $firstCourse->class ?? '' }}
                        @endif
                    </td>
                    <td>{{ $firstCourse->sks ?? '' }}</td>
                    <td>{{ $firstCourse ? 1 : '' }} </td>
                    <td>{{ $firstCourse->sks ?? '' }}</td>
                    <td rowspan="{{ $rows > 2 ? $rows : 2 }}">{{ $count }}</td>
                    <td rowspan="{{ $rows > 2 ? $rows : 2 }}"> {{ $count - 16 > 0 ? $count - 16 : 0 }}
                    </td>
                </tr>
                <tr>
                    <td>NIP.{{ $l->nip }}</td>
                    <td>{{ $l->role }}</td>
                    <td></td>
                    <td></td>
                    @php
                        $secondCourse = $courses[1]->course ?? null;
                    @endphp
                    <td>{{ $secondCourse->name ?? '' }}</td>
                    <td>
                        @if ($secondCourse)
                            {{ $secondCourse->studyprogram ?? '' }}/{{ $secondCourse->semester ?? '' }}/{{ $secondCourse->class ?? '' }}
                        @endif
                    </td>
                    <td>{{ $secondCourse->sks ?? '' }}</td>
                    <td>{{ $secondCourse ? 1 : '' }} </td>
                    <td>{{ $secondCourse->sks ?? '' }}</td>



                </tr>
                @if ($courses && !empty($courses->slice(2)))
                    @foreach ($courses->slice(2) as $c)
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td>{{ $c->course->name }}</td>
                            <td>
                                @if ($c)
                                    {{ $c->course->studyprogram }}/{{ $c->course->semester !== 0 ?: 'Pilihan' }}/{{ $c->course->class }}
                                @endif
                            </td>
                            <td>{{ $c->course->sks }}</td>
                            <td>1</td>
                            <td>{{ $c->course->sks }}</td>

                        </tr>
                    @endforeach
                @else
                @endif
                <tr>
                    <td colspan="12"> </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table>
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Mengetahui</td>
            <td></td>
            <td></td>
            <td colspan="2">Pekanbaru, 02 Februari 2024</td>

        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Ketua Prodi SI</td>
            <td></td>
            <td></td>
            <td colspan="2">Disusun Oleh, </td>

        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>dto</td>
            <td></td>
            <td></td>
            <td colspan="2">Sekretaris Prodi SI</td>


        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Eki Saputra, M.Kom</td>
            <td></td>
            <td></td>
            <td colspan="2">dto</td>


        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>NIP.198307162011011008</td>
            <td></td>
            <td></td>
            <td colspan="2">Siti Monalisa, ST, M.Kom</td>

        </tr>
    </table>
