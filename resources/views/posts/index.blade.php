@extends('layouts.app1')
  
@section('title', 'Announcements')
  
@section('contents')


<link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/css/index-posts.css') }}">


<?php /*----------------------------------------Admin-------------------------------------------------------*/ ?>

@if (Auth::user()->role=='Admin')
    <a href="{{ route('posts.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add Announcement">Add Announcements</a>

@endif

<div class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center">
            <a href="{{ route('dashboard') }}"></a>
    </div><br>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    {{-- Posts Wrapper --}}
    <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
        @foreach ($posts as $post)
            {{-- Post --}}
            <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                {{-- Header --}}
                <div class="flex-shrink-0">
                </div>

                {{-- Content --}}
                <div class="flex-1 p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <a href="/posts/{{ $post->id }}"></a>

                            <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">{{ $post->title }}</h3>
                        <p class="mt-3 text-base leading-6 text-black-500">
                            @if (strlen($post->text) > 200)
                                {{ substr($post->text, 0, 200) }}...
                            @else
                                {{ $post->text }}
                            @endif
                        </p>
                    </div>

                    <div class="mt-6 flex items-center">
                        <div class="flex-shrink-0">
                        </div>

                        <div class="ml-3">
                            <p class="text-sm leading-5 font-medium text-gray-900">Admin</p>
                            <div class="flex text-sm leading-5 text-black-500">
                                <time datetime="{{ $post->created_at }}">
                                    {{ $post->created_at->diffForHumans() }}
                                </time>
                                <span class="mx-1">&middot;</span>
                                <span>{{ ceil(strlen($post->text) / 863) }} min read</span><br><br>
                            </div>
                        </div>

                        @if (Auth::user()->role == 'Admin')
                        <div class="button-delete">
                            <div class="flex-shrink-0">
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="dt" class="text-red-600 hover:text-red-900 focus:outline-none focus:underline transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="Delete">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endif

    
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection






