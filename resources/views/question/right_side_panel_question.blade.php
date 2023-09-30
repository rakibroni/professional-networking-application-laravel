<div class="recom-quest p-3">
    <span class="quest-subtitle" role="text">
        <!-- Categories -->
        <img src="{{ asset('images/icon/Rectangle.svg') }}" alt="Rectangle" />
        @foreach ($question_category as $data)
            <a href="#">{{ $data->name }}</a>
            @if (!$loop->last),
            @endif
        @endforeach
    </span>
    <!-- Question Titile -->
    <div class="quest-title py-1">
        <a href="#" role="heading">
            {{ $question->title }}
        </a>
    </div>
    <!-- Actions Bar  -->
    <div class="quest-actions d-flex align-items-center font-size-14 font-weight-400 line-height-16">
        <!-- Views -->
        <div role="button" class="me-3">
            <span role="svg" class="pe-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#7F7F7F" class="bi bi-eye"
                    viewBox="0 0 16 16">
                    <path
                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg>
            </span>
            <span class="text-hover-decoration-underline">{{ $total_views }}</span>
        </div>
        <!-- Replaies -->
        <div role="button" class="me-3">
            <span role="svg" class="pe-1">
                <svg class="replay-icon" width="15" height="15" viewBox="0 0 28 22" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.7997 6.08203L26 13.3721L18.7997 20.1619" stroke="#7F7F7F" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M24.2456 13.1781L10.7473 13.1441C3.82294 13.0786 2.17939 9.13614 5.74181 2.0111"
                        stroke="#7F7F7F" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span class="text-hover-decoration-underline">{{ $total_comments }}</span>
        </div>
        <!-- Experts Views -->
        @if (!empty($total_expert_answered))
            <div role="button" class="d-flex align-items-center">
                <span role="svg" class="pe-1">
                    <img src="{{ asset('images/icon/ExpertIcon.svg') }}" alt="icon" width="15" height="11" />
                </span>
                <span class="text-hover-decoration-underline">

                    <span>{{ $total_expert_answered }}</span>
                </span>
            </div>
        @endif
    </div>
</div>
