@extends('admin.layout')

@section('title', 'Analytics Dashboard')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1><i class="material-icons">analytics</i> Analytics Dashboard</h1>
            <p class="text-muted">Track visitor activity and engagement across your website</p>
        </div>
        <div>
            <form method="GET" action="{{ route('admin.analytics.index') }}" class="d-inline">
                <select name="period" class="form-select" onchange="this.form.submit()">
                    <option value="7" {{ $period == 7 ? 'selected' : '' }}>Last 7 Days</option>
                    <option value="14" {{ $period == 14 ? 'selected' : '' }}>Last 14 Days</option>
                    <option value="30" {{ $period == 30 ? 'selected' : '' }}>Last 30 Days</option>
                    <option value="60" {{ $period == 60 ? 'selected' : '' }}>Last 60 Days</option>
                    <option value="90" {{ $period == 90 ? 'selected' : '' }}>Last 90 Days</option>
                </select>
            </form>
        </div>
    </div>
</div>

<!-- Live Stats Cards -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #28a745 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1"><i class="material-icons" style="font-size: 18px;">people</i> Live Visitors</p>
                        <h3 class="mb-0" id="live-visitors">{{ $liveVisitors }}</h3>
                    </div>
                    <div class="text-success">
                        <i class="material-icons" style="font-size: 48px; opacity: 0.2;">visibility</i>
                    </div>
                </div>
                <small class="text-success">● Active now</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #007bff !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1"><i class="material-icons" style="font-size: 18px;">person_add</i> Today's Visitors</p>
                        <h3 class="mb-0">{{ $todayVisitors }}</h3>
                    </div>
                    <div class="text-primary">
                        <i class="material-icons" style="font-size: 48px; opacity: 0.2;">people</i>
                    </div>
                </div>
                <small class="text-muted">{{ today()->format('M d, Y') }}</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #ffc107 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1"><i class="material-icons" style="font-size: 18px;">visibility</i> Today's Page Views</p>
                        <h3 class="mb-0">{{ $todayPageViews }}</h3>
                    </div>
                    <div class="text-warning">
                        <i class="material-icons" style="font-size: 48px; opacity: 0.2;">pageview</i>
                    </div>
                </div>
                <small class="text-muted">Total views today</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #17a2b8 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1"><i class="material-icons" style="font-size: 18px;">timer</i> Avg Session</p>
                        <h3 class="mb-0">{{ gmdate('i:s', $avgSessionDuration ?? 0) }}</h3>
                    </div>
                    <div class="text-info">
                        <i class="material-icons" style="font-size: 48px; opacity: 0.2;">schedule</i>
                    </div>
                </div>
                <small class="text-muted">Duration per visit</small>
            </div>
        </div>
    </div>
</div>

<!-- Visitors & Page Views Trend -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="material-icons" style="font-size: 20px;">trending_up</i> Visitors & Page Views Trend</h5>
            </div>
            <div class="card-body">
                <canvas id="trendChart" height="80"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Department Visits & Popular Pages -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="material-icons" style="font-size: 20px;">business</i> Department Page Visits</h5>
            </div>
            <div class="card-body">
                @if($departmentVisits->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Department</th>
                                <th class="text-end">Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departmentVisits as $dept)
                            <tr>
                                <td>
                                    <small class="text-muted d-block">{{ Str::limit($dept->page_url, 50) }}</small>
                                    {{ $dept->page_title ?? 'N/A' }}
                                </td>
                                <td class="text-end">
                                    <span class="badge bg-primary">{{ $dept->views }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted text-center py-4">No department visits recorded yet</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="material-icons" style="font-size: 20px;">star</i> Most Popular Pages</h5>
            </div>
            <div class="card-body">
                @if($popularPages->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th class="text-end">Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($popularPages as $page)
                            <tr>
                                <td>
                                    <small class="text-muted d-block">{{ Str::limit($page->page_url, 50) }}</small>
                                    {{ $page->page_title ?? 'N/A' }}
                                </td>
                                <td class="text-end">
                                    <span class="badge bg-success">{{ $page->views }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted text-center py-4">No page views recorded yet</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Device & Browser Breakdown -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="material-icons" style="font-size: 20px;">devices</i> Device Breakdown</h5>
            </div>
            <div class="card-body">
                <canvas id="deviceChart" height="250"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="material-icons" style="font-size: 20px;">web</i> Browser Breakdown</h5>
            </div>
            <div class="card-body">
                <canvas id="browserChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Traffic Sources & Peak Hours -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="material-icons" style="font-size: 20px;">link</i> Top Traffic Sources</h5>
            </div>
            <div class="card-body">
                @if($trafficSources->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Referrer</th>
                                <th class="text-end">Visitors</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trafficSources as $source)
                            <tr>
                                <td>
                                    <small>{{ Str::limit($source->referrer, 60) }}</small>
                                </td>
                                <td class="text-end">
                                    <span class="badge bg-info">{{ $source->count }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted text-center py-4">No referrer data available</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="material-icons" style="font-size: 20px;">schedule</i> Peak Traffic Hours</h5>
            </div>
            <div class="card-body">
                <canvas id="peakHoursChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
// Trend Chart
const trendCtx = document.getElementById('trendChart').getContext('2d');
new Chart(trendCtx, {
    type: 'line',
    data: {
        labels: @json($trendData['dates']),
        datasets: [
            {
                label: 'Visitors',
                data: @json($trendData['visitors']),
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                tension: 0.4,
                fill: true
            },
            {
                label: 'Page Views',
                data: @json($trendData['views']),
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                tension: 0.4,
                fill: true
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Device Chart
const deviceCtx = document.getElementById('deviceChart').getContext('2d');
new Chart(deviceCtx, {
    type: 'doughnut',
    data: {
        labels: @json(array_keys($deviceBreakdown)),
        datasets: [{
            data: @json(array_values($deviceBreakdown)),
            backgroundColor: ['#007bff', '#28a745', '#ffc107'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

// Browser Chart
const browserCtx = document.getElementById('browserChart').getContext('2d');
new Chart(browserCtx, {
    type: 'pie',
    data: {
        labels: @json(array_keys($browserBreakdown)),
        datasets: [{
            data: @json(array_values($browserBreakdown)),
            backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff', '#ff9f40'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

// Peak Hours Chart
const peakHoursCtx = document.getElementById('peakHoursChart').getContext('2d');
new Chart(peakHoursCtx, {
    type: 'bar',
    data: {
        labels: @json($peakHours['hours']),
        datasets: [{
            label: 'Visitors',
            data: @json($peakHours['counts']),
            backgroundColor: '#17a2b8',
            borderRadius: 5
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            },
            x: {
                ticks: {
                    maxRotation: 45,
                    minRotation: 45
                }
            }
        }
    }
});

// Auto-refresh live visitors every 30 seconds
setInterval(function() {
    fetch('{{ route("admin.analytics.data") }}?period={{ $period }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('live-visitors').textContent = data.liveVisitors;
        })
        .catch(error => console.error('Error updating live visitors:', error));
}, 30000);
</script>
@endpush
