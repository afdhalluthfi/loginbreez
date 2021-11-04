<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Timeline
            </h2>
    </x-slot>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-8">
                <div class="space-y-6">
                <div class="border p-5 rounded-xl space-y-5">
                    @foreach ($statuses as $item)
               <div class="flex">
                    <div class="flex-shrink-0 mr-2">
                        <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150" alt="" srcset="">
                    </div>
                    <div class="leading-relaxed">
                        <div class="font-semibold">{{$item->user->name}}</div>
                        <div>{{$item->body}}</div>
                        {{-- <div>{{$item->created_at->format('d,F,Y')}}</div> --}}
                        <div class="text-sm text-gray-600">{{$item->created_at->diffForHumans()}}</div>

                    </div>
                </div>
            @endforeach
                </div>
            </div>
            </div>
            <div class="col-span-4">
                <div class="border p-5 rounded-xl">
                    <h1 class="font-semibold mb-5">Recently Follow</h1>
                    <div class="space-y-5">
                        @foreach (Auth::user()->follower as $item)
                        <div class="flex items-center">
                        <div class="flex-shrink-0 mr-2">
                            <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150" alt="" srcset="">
                        </div>
                        <div class="leading-relaxed">
                            <div class="font-semibold">{{$item->name}}</div>
                            {{-- <div>{{$item->created_at->format('d,F,Y')}}</div> --}}
                            <div class="text-sm text-gray-600">{{$item->pivot->created_at->diffForHumans()}}</div>
                        </div>
                    </div>
                    @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>