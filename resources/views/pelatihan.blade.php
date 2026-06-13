@extends('layouts-user.main')

@section('content')

<!-- ===== PELATIH SECTION ===== -->
<!-- <section id="pelatihan" class="py-5 bg-light">
    <div class="container mb-5">
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="800">
            <h2 class="fw-bold">Pelatih Profesional</h2>
            <p class="text-muted">Kenali para pelatih yang berpengalaman di bidangnya</p>
        </div>

        <div class="row justify-content-center g-4">
            @foreach($pelatihans as $index => $item)
            <div class="col-lg-4 col-md-6" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 100 }}" 
                 data-aos-duration="800">
                <div class="card-pelatih d-flex align-items-center shadow-sm p-4 rounded-4 bg-white hover-card">
                    <div class="pelatih-img me-3 flex-shrink-0">
                        <img src="{{ asset('public/storage/' . $item->pegawai->image) }}" 
                             alt="{{ $item->pegawai->name }}" 
                             class="rounded-circle border" 
                             style="width: 90px; height: 90px; object-fit: cover;">
                    </div>
                    <div class="pelatih-info text-start flex-fill">
                        <h5 class="fw-bold text-dark mb-1">{{ $item->pegawai->name }}</h5>
                        <p class="text-secondary mb-1">{{ $item->pegawai->position }}</p>
                        <p class="text-muted mb-3">{{ $item->keahlian->keahlian_name }}</p>
                        <a href="https://wa.me/{{ $item->pegawai->no_wa ?? '6281234567890' }}" 
                           target="_blank" 
                           class="btn btn-outline-success btn-sm rounded-pill px-3 py-1">
                            <i class="fab fa-whatsapp"></i> Hubungi
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> -->

<!-- ===== AGENDA SECTION ===== -->
<section class="py-5 bg-white position-relative">
    <div class="container">
        <div class="section-title text-center mb-4" data-aos="fade-up" data-aos-duration="800">
            <h2 class="fw-bold">Agenda Kegiatan</h2>
            <p class="text-muted">Jadwal kegiatan dan pelatihan yang akan datang</p>
        </div>
        <div id="calendar" class="shadow-sm rounded-4 p-3 bg-light" data-aos="zoom-in" data-aos-duration="900"></div>
    </div>

    <!-- Modal Detail Event -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" data-aos="zoom-in" data-aos-duration="500">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-header bg-success text-white rounded-top-4">
                    <h5 class="modal-title" id="eventTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Tanggal :</strong> <span id="eventDate"></span></p>
                    <p><strong>Deskripsi :</strong></p>
                    <p id="eventDescription"></p>
                    <div id="eventImageContainer" class="text-center mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== FULLCALENDAR SCRIPT ===== -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'id',
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listWeek'
            },
            themeSystem: 'standard',
            navLinks: true,
            editable: false,
            selectable: true,
            dayMaxEvents: true,
            events: '{{ route("agenda.events") }}',
            eventClick: function (info) {
                var event = info.event;
                document.getElementById('eventTitle').innerText = event.title;
                document.getElementById('eventDate').innerText =
                    event.start.toLocaleString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                    }) +
                    (event.end ? ' - ' + event.end.toLocaleString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                    }) : '');
                document.getElementById('eventDescription').innerHTML = event.extendedProps.desc || '-';
                var imgContainer = document.getElementById('eventImageContainer');
                imgContainer.innerHTML = event.extendedProps.image
                    ? `<img src="/storage/${event.extendedProps.image}" class="img-fluid rounded shadow">`
                    : '';
                new bootstrap.Modal(document.getElementById('eventModal')).show();
            }
        });

        calendar.render();
    });
</script>

<style>
    .hover-card {
        transition: all 0.3s ease-in-out;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .section-title h2 {
        font-weight: 700;
        color: #2b2b2b;
    }
    .section-title p {
        color: #777;
    }

    #calendar {
        background: #fff;
        border-radius: 16px;
    }

    .modal-content {
        border-radius: 20px !important;
    }
</style>

@endsection
