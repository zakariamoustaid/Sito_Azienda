@extends('layouts.sito')
@section('content')
<!-- Alert -->
<div id="error_div" class="alert alert-danger">
    <p> Selezionare un range di date corretto!</p>
</div>

<!-- HOME -->
<h3 class="card-title"><strong> Buongiorno {{ Auth::user()->name }} </strong></h3>

<div class="row top-buffer"></div>
<p class="card-text"><strong> Qui di seguito una panoramica della situazione Clienti / Progetti<strong></p>

    <!-- sezione project -->
    <div style="width: 500px; float: right;">

        <button type="button" id="b_progetti" class="btn btn-outline-dark">Range PROGETTI</button>
        <div class="row top-buffer"></div>
            <div class="row">
                <div id="selezione_p" class="col">
                    <label>Da:</label>
                    <input type="date" value="<?php echo date('Y-m-01'); ?>" class="form-control" id="data" >
                </div>
                <div id="selezione_p2" class="col">
                    <label>A:</label>
                    <input type="date" value="<?php echo date('Y-m-t'); ?>" class="form-control" id="data2" >
                </div>
                <div id="selezione_p3" class="col">
                    <div class="row top-buffer"></div>
                    <button type="button" id="Chart1" class="btn btn-outline-primary float-md-right">Conferma</button>
                    </div>
                </div>
        <div class="row top-buffer"></div>
            <small class="form-text text-muted" id="descrizioneP"><strong>Di seguito sono visualizzate le ore totali di questo mese, selezionare il range di interesse per maggiori dettagli.</strong></small>
            <div class="chart-container">
                <canvas id="myChart1"></canvas>
            </div>
        </div>

        <!-- Sezione customer -->
        <div style="width: 500px; float: left;">

            <button type="button" id="b_clienti" class="btn btn-outline-dark">Range CLIENTI</button>
                <div class="row top-buffer"></div>
                <div class="row">
                    <div id="selezione_c" class="col">
                        <label>Da:</label>
                        <input type="date" value="<?php echo date('Y-m-01'); ?>" class="form-control" id="data3" >
                    </div>
                    <div id="selezione_c2" class="col">
                        <label>A:</label>
                        <input type="date" value="<?php echo date('Y-m-t'); ?>" class="form-control" id="data4" >
                    </div>
                    <div id="selezione_c3" class="col">
                        <div class="row top-buffer"></div>
                            <button type="button" id="Chart2" class="btn btn-outline-primary float-md-right">Conferma</button>
                        </div>
                    </div>
                    <div class="row top-buffer"></div>
                        <small class="form-text text-muted" id="descrizioneC"><strong>Di seguito sono visualizzate le ore totali di questo mese, selezionare il range di interesse per maggiori dettagli.</strong></small>
                        <div class="chart-container">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
        </div>
</div>

    
<script type="text/javascript">
(function($) {
    $(document).on("click", "#b_clienti", function (e) {
        e.preventDefault();
        $('#selezione_c').css('display', 'block');
        $('#selezione_c2').css('display', 'block');
        $('#selezione_c3').css('display', 'block');

    });
    $(document).on("click", "#b_progetti", function (e) {
        e.preventDefault();
        $('#selezione_p').css('display', 'block');
        $('#selezione_p2').css('display', 'block');
        $('#selezione_p3').css('display', 'block');

    });

    $('document').ready(function(){

        //grafico projects
        var chart1 = document.getElementById('myChart1').getContext('2d');
        const projects = @json($projects);
        const diaries = @json($diaries);
        var projects_names = [];
        var tot_h = 0;
        var hours2 = [];
        //projects.forEach(element => console.log(element.id));
        const customers = @json($customers);
        var data_input = $('#data').val();
        var data_input2 = $('#data2').val();
        //console.log(data_input, data_input2);
        if(data_input == '' || data_input2 == '')
            $('#error_div').css('display', 'block').fadeOut(5000);

        for(p of projects)
        {
            projects_names.push(p.name);
            for(d of diaries)
            {
                if(d.today >= data_input && d.today <= data_input2 && d.project_id == p.id)
                {
                    tot_h = d.hours + tot_h;
                }
            }
            
            hours2.push(tot_h);
            tot_h = 0;

        }

        //console.log(hours);
        if(window.myCharts != undefined)
            window.myCharts.destroy();
        window.myCharts = new Chart(chart1, {
            type: 'bar',
            data: {
                labels: projects_names,
                datasets: [{
                    label: 'ORE SPESE PER OGNI PROGETTO',
                    data: hours2,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive:true,
                maintainAspectRatio: false,
                indexAxis: 'x',
            }
        });

        //grafico customers
        var chart2 = document.getElementById('myChart2').getContext('2d');
        var customers_names = [];
        tot_h = 0;
        var hours3 = [];
        //projects.forEach(element => console.log(element.id));
        var data_input = $('#data3').val();
        var data_input2 = $('#data4').val();
        //console.log(data_input, data_input2);
        if(data_input == '' || data_input2 == '')
            $('#error_div').css('display', 'block').fadeOut(5000);

        for(c of customers)
        {
            customers_names.push(c.ragione_sociale);
            for(p of projects)
            {
                for(d of diaries)
                {
                    if(p.customer_id == c.id && d.today >= data_input && d.today <= data_input2 && d.project_id == p.id)
                    {
                        tot_h = d.hours + tot_h;
                        
                    }
                }
            }
            hours3.push(tot_h);
            tot_h = 0;
        }

        if(window.myCharts2 != undefined)
            window.myCharts2.destroy();
        window.myCharts2 = new Chart(chart2, {
            type: 'bar',
            data: {
                labels: customers_names,
                datasets: [{
                    label: 'ORE SPESE PER OGNI CLIENTE ',
                    data: hours3,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive:true,
                maintainAspectRatio: false,
                indexAxis: 'x',
            }
        });
    
        $("#Chart1").bind('click', function(){
            $('#descrizioneP').css('display', 'none');
            var chart1 = document.getElementById('myChart1').getContext('2d');
            const projects = @json($projects);
            const diaries = @json($diaries);
            var projects_names = [];
            var tot_h = 0;
            var hours2 = [];
            //projects.forEach(element => console.log(element.id));
            const customers = @json($customers);
            var data_input = $('#data').val();
            var data_input2 = $('#data2').val();
            //console.log(data_input, data_input2);
            if(data_input == '' || data_input2 == '' || data_input > data_input2)
                $('#error_div').css('display', 'block').fadeOut(5000);

            else{
                for(p of projects)
                {
                    projects_names.push(p.name);
                    for(d of diaries)
                    {
                        if(d.today >= data_input && d.today <= data_input2 && d.project_id == p.id)
                        {
                            tot_h = d.hours + tot_h;
                        }
                    }
                    hours2.push(tot_h);
                    tot_h = 0;
                }

                //console.log(hours);
                if(window.myCharts != undefined)
                    window.myCharts.destroy();
                window.myCharts = new Chart(chart1, {
                    type: 'bar',
                    data: {
                        labels: projects_names,
                        datasets: [{
                            label: 'ORE SPESE PER OGNI PROGETTO',
                            data: hours2,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive:true,
                        maintainAspectRatio: false,
                        indexAxis: 'x',
                    }
                });
            }
        });

        //parte customer
        $("#Chart2").bind('click', function(){
            $('#descrizioneC').css('display', 'none');
            var chart2 = document.getElementById('myChart2').getContext('2d');
            const customers = @json($customers);
            const diaries = @json($diaries);
            const projects = @json($projects);
            var customers_names = [];
            var tot_h = 0;
            var hours3 = [];
            //projects.forEach(element => console.log(element.id));
            var data_input = $('#data3').val();
            var data_input2 = $('#data4').val();
            //console.log(data_input, data_input2);
            if(data_input == '' || data_input2 == '' || data_input > data_input2)
                $('#error_div').css('display', 'block').fadeOut(5000);
            else{
                for(c of customers)
                {
                    customers_names.push(c.ragione_sociale);
                    for(p of projects)
                    {
                        for(d of diaries)
                        {
                            if(p.customer_id == c.id && d.today >= data_input && d.today <= data_input2 && d.project_id == p.id)
                            {
                                tot_h = d.hours + tot_h;
                                
                            }
                        }
                    }
                    hours3.push(tot_h);
                    tot_h = 0;
                }

                if(window.myCharts2 != undefined)
                    window.myCharts2.destroy();
                window.myCharts2 = new Chart(chart2, {
                    type: 'bar',
                    data: {
                        labels: customers_names,
                        datasets: [{
                            label: 'ORE SPESE PER OGNI CLIENTE ',
                            data: hours3,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive:true,
                        maintainAspectRatio: false,
                        indexAxis: 'x',
                    }
                });
            }
        });
});
})(jQuery);
</script>

@endsection
