
<!-- COPYRIGHT-->
<section class="p-t-60 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2020 Saaf Ghassen. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END COPYRIGHT-->
</div>



<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            "language": {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher :",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                }
            },
            "columnDefs": [ {
                "targets": 0,
                "orderable": false
            }
            ],
            "order": [[7, 'dsc']]
        } );
    } );
</script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>

<!-- full calendar requires moment along jquery which is included above -->
<script src="vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
<script src="vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

<!-- Main JS-->
<script src="js/main.js"></script>

<script>
    function checkAv(str) {
        if(str.value.length< 7) {
            document.getElementById("num_ass_r").innerHTML = "";
            str.classList.add("is-invalid");
            str.classList.remove("is-valid");
            return;
        }
        else {
            var xmlhttp = new XMLHttpRequest();
            
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("num_ass_r").innerHTML = this.responseText;
                    if(document.querySelector('#num_ass_r>span').classList.contains("text-danger") )
                    {
                        str.classList.add("is-invalid");
                        str.classList.remove("is-valid");
                    }
                    else
                    {
                        str.classList.add("is-valid");
                        str.classList.remove("is-invalid");
                    }
                }
            };
            xmlhttp.open("GET","inc/forms.php?form=checkAss&q="+str.value,true);
            xmlhttp.send();

        }

    }
    function checkAvD(str) {
        if(str.value.length< 9) {
            document.getElementById("num_dec_r").innerHTML = "";
            str.classList.add("is-invalid");
            str.classList.remove("is-valid");
            return;
        }
        else {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("num_dec_r").innerHTML = this.responseText;
                    if(document.querySelector('#num_dec_r>span').classList.contains("text-danger") )
                    {
                        str.classList.add("is-invalid");
                        str.classList.remove("is-valid");
                    }
                    else
                    {
                        str.classList.add("is-valid");
                        str.classList.remove("is-invalid");
                    }
                }
            };
            xmlhttp.open("GET","inc/forms.php?form=checkDec&q="+str.value,true);
            xmlhttp.send();

        }

    }
    function validate(element) {
        if(element.value.length>3)
        {
            element.classList.add("is-valid");
            element.classList.remove("is-invalid");
        }
        else
        {
            element.classList.add("is-invalid");
            element.classList.remove("is-valid");
        }
    }
    function submit_form(x)
    {

        let inputs= x.elements;
        for (let i=0;i<inputs.length;i++)
        {
            if (inputs[i].classList.contains("is-invalid"))
            {
                return false;
            }
        }
    }
</script>
<script type="text/javascript">
    $(function() {
        // for now, there is something adding a click handler to 'a'
        var tues = moment().day(2).hour(19);

        // build trival night events for example data
        var events = [
            {
                title: "Special Conference",
                start: moment().format('YYYY-MM-DD'),
                url: '#'
            },
            {
                title: "Doctor Appt",
                start: moment().hour(9).add(2, 'days').toISOString(),
                url: '#'
            }

        ];

        var trivia_nights = []

        for(var i = 1; i <= 4; i++) {
            var n = tues.clone().add(i, 'weeks');
            console.log("isoString: " + n.toISOString());
            trivia_nights.push({
                title: 'Trival Night @ Pub XYZ',
                start: n.toISOString(),
                allDay: false,
                url: '#'
            });
        }

        // setup a few events
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            events: events.concat(trivia_nights)
        });
    });
</script>

<script type="text/javascript">
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }
    function checkDate(day) {
        <?php
        $js_array = json_encode($jourf);
        echo "var javascript_array = ". $js_array . ";\n";
        ?>
        for(let count=0;count<javascript_array.length;count++)
        {
            if(javascript_array[count].jour==day)
            {
                return true;
            }
        }

    }
    function nextDay3(h,x)
    {
        if(x==0)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (1 + 7 - j.getDay()) % 7);
            if(checkDate(formatDate(j))==true)
            {return nextDay3(j,1)}
            else
            {return j}
        }
        else if(x==1)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (3 + 7 - j.getDay()) % 7);
            console.log(j)
            if(checkDate(formatDate(j))==true)
            {return nextDay3(j,3)}
            else
            {return j}
        }
        else if(x==2)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (4 + 7 - j.getDay()) % 7);
            console.log(j)
            if(checkDate(formatDate(j))==true)
            {return nextDay3(j,4)}
            else
            {return j}
        }
        else if(x==3)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (5 + 7 - j.getDay()) % 7);
            console.log(j)
            if(checkDate(formatDate(j))==true)
            {return nextDay3(j,5)}
            else
            {return j}
        }
        else if(x==4)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (6 + 7 - j.getDay()) % 7);
            console.log(j)
            if(checkDate(formatDate(j))==true)
            {return nextDay3(j,6)}
            else
            {return j}
        }
        else if(x==5)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (1 + 7 - j.getDay()) % 7);
            console.log(j)
            if(checkDate(formatDate(j))==true)
            {return nextDay3(j,1)}
            else
            {return j}
        }
        else if(x==6)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (2 + 7 - j.getDay()) % 7);
            console.log(j)
            if(checkDate(formatDate(j))==true)
            {return nextDay3(j,2)}
            else
            {return j}
        }
    }
    function nextDay2(h,x)
    {
        if(x==0)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (1 + 7 - j.getDay()) % 7);
            return j;
        }
        else if(x==1)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (4 + 7 - j.getDay()) % 7);
            return j;
        }
        else if(x==2)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (5 + 7 - j.getDay()) % 7);
            return j;
        }
        else if(x==3)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (6 + 7 - j.getDay()) % 7);
            return j;
        }
        else if(x==4)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (1 + 7 - j.getDay()) % 7);
            return j;
        }
        else if(x==5)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (2 + 7 - j.getDay()) % 7);
            return j;
        }
        else if(x==6)
        {
            j= new Date(h);
            j.setDate(j.getDate() + (3 + 7 - j.getDay()) % 7);
            return j;
        }
    }
    function nextDay1(h,x)
    {
        if(x==0)
        {
            j= new Date(h);
            j.setDate(j.getDate() +7);
            return j;
        }
        else if(x==1)
        {
            j= new Date(h);
            j.setDate(j.getDate() + 7);
            return j;
        }
        else if(x==2)
        {
            j= new Date(h);
            j.setDate(j.getDate() + 7);
            return j;
        }
        else if(x==3)
        {
            j= new Date(h);
            j.setDate(j.getDate() + 7);
            return j;
        }
        else if(x==4)
        {
            j= new Date(h);
            j.setDate(j.getDate() +  7);
            return j;
        }
        else if(x==5)
        {
            j= new Date(h);
            j.setDate(j.getDate() + 7);
            return j;
        }
        else if(x==6)
        {
            j= new Date(h);
            j.setDate(j.getDate() + 7);
            return j;
        }
    }
    function handler(e,x='')
    {
        var d=document.getElementById('nbs'+x).value;
        d= parseInt(d, 10);
        d=d+1;
        for(let i=1;i<d;i++)
        {
            if(i==1)
            {
                let z='j'+x+'r'+i;
                let w=new Date(document.getElementById('date_deb'+x).value);
                let month= ''+(w.getMonth()+1);if(month.length<2){month = '0' + month;}
                let day= ''+(w.getDate());if(day.length<2){day = '0' + day;}
                let jour=day+'/'+month+'/'+w.getFullYear();
                document.getElementById(z).value=jour;
            }
            else
            {
                let z='j'+x+'r'+i;
                let zz='j'+x+'r'+(i-1);
                let yesterday=document.getElementById(zz).value.substr(6, 4)+'-'+document.getElementById(zz).value.substr(3, 2)+'-'+document.getElementById(zz).value.substr(0, 2);
                console.log(yesterday);
                let yest=new Date(yesterday).getDay();
                let w;
                if(document.getElementById('nb_p_s').value==3){w=nextDay3(yesterday,yest);}
                if(document.getElementById('nb_p_s').value==2){w=nextDay2(yesterday,yest);}
                if(document.getElementById('nb_p_s').value==1){w=nextDay1(yesterday,yest);}
                let month= ''+(w.getMonth()+1);if(month.length<2){month = '0' + month;}
                let day= ''+(w.getDate());if(day.length<2){day = '0' + day;}
                let jour=day+'/'+month+'/'+w.getFullYear();
                document.getElementById(z).value=jour;
            }
        }
        for(let i=d;i<37;i++)
        {
            let z='j'+x+'r'+i;
            document.getElementById(z).value='';
        }
    }
</script>
</body>

</html>
<!-- end document-->
