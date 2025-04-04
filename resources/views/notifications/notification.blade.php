@extends('layouts.dashboard')
@section('isi')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body p-4">
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover">
                        <tbody>
                            @foreach ($inboxs as $inbox)
                                @php
                                    $user = App\Models\User::find($inbox->data['user_id']);
                                    $bgColor = $inbox->read_at == null ? 'background-color: #f0f0f0;' : 'background-color: #ffffff;';
                                @endphp
                                <tr class="clickable-row" data-href="{!! !$inbox->read_at ? url('/notifications/read-message/'.$inbox->id) : url($inbox->data['action']); !!}" style="cursor: pointer; {{ $bgColor }}">
                                    <td>
                                        @if($user->foto == null)
                                            <img style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;" src="{{ url('assets/img/foto_default.jpg') }}" alt="{{ $user->name ?? '-' }}">
                                        @else
                                            <img style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;" src="{{ url('/storage/'.$user->foto) }}" alt="{{ $user->name ?? '-' }}">
                                        @endif
                                    </td>
                                    <td class="mailbox-name"><a href="read-mail.html">{{ $user->name }}</a></td>
                                    <td class="mailbox-subject">{{ $inbox->data['message'] }}
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">{{ date('d M Y H:i:s',strtotime($inbox->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end mr-4">
                {{ $inboxs->links() }}
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function(){
                $(".clickable-row").click(function() {
                    window.location.href = $(this).data("href");
                });
            });
        </script>
    @endpush
@endsection
