@if (!empty($counseling))
    @foreach ($counseling as $item)
    <li class="timeline-item">
        <div>
            <h4 class="text-white mb-3" style="float: left;">{{ $item->NamaKegiatan }}</h4>
            <h4 class="text-white mb-3" style="float: right;">
                {{ $item->NamaBidan }} /
                {{ \Carbon\Carbon::parse($item->TanggalKegiatan)->isoFormat('dddd, D MMMM Y') }}
            </h4>
        </div>
        <br>
        <div class="icon-holder">
            @if (\Carbon\Carbon::parse($item->TanggalKegiatan)->isToday())
            <i class="bi bi-calendar-check" onclick="openModalWithId({{ $item->id }})"></i>
            @elseif (\Carbon\Carbon::parse($item->TanggalKegiatan)->isPast())
            <i class="bi bi-calendar-check" style="color: gray; cursor: pointer;"
                onclick="showPastAlert('{{ $item->NamaKegiatan }}')"></i>
            @else
            <i class="bi bi-calendar-check" style="color: gray; cursor: not-allowed;"></i>
            @endif
        </div>
    </li>
    @endforeach
@endif
