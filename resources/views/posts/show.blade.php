@extends('layouts.app1')

@section('title', 'Show Announcements')
  
@section('contents')
<link rel="shortcut icon" href="{{ URL::to('assets/images/logo/accounting.png') }}">
<link rel="shortcut icon" href="{{ URL::to('assets/images/logo/accounting.png') }}" type="image/x-icon">


<link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">


        <div class="bg-box">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                </div>

                <div class="ml-3">
                    <p class="text-sm leading-5 font-medium text-gray-900">Admin</p>
                    <div class="flex text-sm leading-5 text-gray-500">
                        <time datetime="{{ $post->created_at }}">
                            {{ $post->created_at->diffForHumans() }}
                        </time>
                        <span class="mx-1">&middot;</span>
                        <span>{{ ceil(strlen($post->text) / 863) }} min read</span>
                    </div>
                </div>
            </div>

            <div class="mt-4 rounded-sm overflow-hidden">
            </div>

            <h2 class="mt-6 text-4xl leading-10 tracking-tight font-bold text-gray-900 text-center">{{ $post->title }}</h2>
            <p class="mt-6 leading-6 text-gray-500">{{ $post->text }}</p><br><br>
        </div>

        <div class="background-design">
            <div class="sm:col-start-4 sm:col-span-6">
                <!-- <a href="{{route('dashboard')}}">
                    <div class="back-tab">Back</div>
                </a> -->

@endsection