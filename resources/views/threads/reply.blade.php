<reply :attributes="{{$reply}}" inline-template="" v-cloak>
    <div class="panel panel-default" id="reply-{{ $reply->id }}">
        <div class="panel-heading">
            <div class="level">
                <h5 class="flex">
                    <a href="{{ route('profile', $reply->owner) }}">
                        {{$reply->owner->name}}
                    </a>
                    said {{$reply->created_at->diffForHumans()}}...
                </h5>
                <div>
                    <form action="/replies/{{ $reply->id }}/favorites" method="POST">
                        {{csrf_field()}}
                        <button class="btn btn-default" type="submit">
                            {{ $reply->favorites_count }} {{str_plural('Favorite', $reply->favorites_count)}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body">
                    </textarea>
                </div>
                <button class="btn btn-xs btn-primary" @click="update">
                    Update
                </button>
                <button class="btn btn-xs btn-link" @click="editing = false">
                    Cancel
                </button>
            </div>
            <div v-else v-text="body">
            </div>
        </div>
        @can('update', $reply)
        <div class="panel-footer level">
            <button @click="editing = true" class="btn btn-xs mr-1">
                Edit
            </button>
            <form action="/replies/{{$reply->id}}" method="POST">
                {{csrf_field()}}
            {{method_field('DELETE')}}
                <button class="btn btn-danger btn-xs" type="submit">
                    DELETE
                </button>
            </form>
        </div>
        @endcan
    </div>
</reply>