  document.addEventListener('DOMContentLoaded', function() {
    espanol= {
        cancel:"Cancelar",
        clear:"Limpiar",
        months:[
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
          ],
                            
          monthsShort:	
          [
            'Ene',
            'Feb',
            'Mar',
            'Abr',
            'May',
            'Jun',
            'Jul',
            'Ago',
            'Sep',
            'Oct',
            'Nov',
            'Dic'
          ],
                            
          weekdays:	
          [
            'Domingo',
            'Lunes',
            'Martes',
            'Miercoles',
            'Jueves',
            'Viernes',
            'Sabado'
          ],
                            
          weekdaysShort:	
          [
            'Dom',
            'Lun',
            'Mar',
            'Mie',
            'Jue',
            'Vie',
            'Sab'
          ],
                            
          weekdaysAbbrev:	['D','L','M','Mi','J','V','S']
      }
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, {i18n:espanol,format:"dddd d , mmmm  yyyy",
    yearRange:[1969,2019], setDefaultDate:true,defaultDate:new Date()});
   
  });
