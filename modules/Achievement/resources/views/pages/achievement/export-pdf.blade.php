@extends('core::layouts.pdf')

@section('title', 'Achievements Data')

@section('table-title', 'ACHIEVEMENTS DATA REPORT')

@section('contents')
    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Student</th>
                <th class="text-center">Supervisor</th>
                <th class="text-center">Period</th>
                <th class="text-center">Achievement Title</th>
                <th class="text-center">Category</th>
                <th class="text-center">Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($achievements as $achievement)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $achievement->student->name }}</td>
                    <td class="text-center">{{ $achievement->participant->lecturer->name }}</td>
                    <td class="text-center">{{ $achievement->period->title }}</td>
                    <td class="text-center">{{ $achievement->title }}</td>
                    <td class="text-center">{{ $achievement->participant->competition->category }} Competition</td>
                    <td class="text-center">{{ $achievement->participant->competition->level }} Competition</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
