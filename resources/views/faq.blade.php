@extends('layouts.app')
@section('title')
    FAQ
@endsection
@section('content')
<div class="d-flex flex-column vacancies mb-5" style="margin-top: 7%">
    <h2 style="text-align: center; margin-bottom: 30px">Frequently Asked Questions</h2>
    <div class="accordion" id="accordion">
        @php $count = 0; @endphp
        @foreach($faq as $item)
            <div class="card_question">
            <div class="d-flex justify-content-around vacancy_header" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;" id="headingThree{{ $count }}">
                <button class="vacancy_btn d-flex collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree{{ $count }}" aria-expanded="false" aria-controls="collapseThree{{ $count }}">
                    <div>
                        <p class="accordion-header vacancy_title d-flex" id="headingThree{{ $count }}" class="mb-0">{{ $item->{'question_' . app()->getLocale() } ? $item->{'question_' . app()->getLocale() } : $item->question_am }} </p>
                    </div>
                </button>
            </div>
            <div id="collapseThree{{ $count }}" class="accordion-collapse collapse" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;" aria-labelledby="headingThree{{ $count }}" data-bs-parent="#accordion">
                <div class="vacancy_collapse accordion-body">
                    <p>{{ $item->{'answer_' . app()->getLocale() } ? $item->{'answer_' . app()->getLocale() } : $item->answer_am }}</p>
                </div>
            </div>
            </div>
          @php $count++; @endphp
        @endforeach

      </div>
</div>
@endsection
@section('scripts')
<script>
</script>
@endsection
