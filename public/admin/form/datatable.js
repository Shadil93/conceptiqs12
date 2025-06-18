$(function () {
    
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    
    let deleteButtonTrans = 'test';
    let deleteButton = {
      text: deleteButtonTrans,
      url: "{{ url('admin.countries.massDestroy') }}",
      className: 'btn-danger',
      action: function (e, dt, node, config) {
        var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
            return entry.id
        });
    
        if (ids.length === 0) {
     
    
          return
        }
    
     
          $.ajax({
            
            method: 'POST',
            url: config.url,
            data: { ids: ids, _method: 'DELETE' }})
            .done(function () { location.reload() })
        
      }
    }
    dtButtons.push(deleteButton)
    
    
    let dtOverrideGlobals = {
      buttons: dtButtons,
      processing: true,
      serverSide: true,
      retrieve: true,
      aaSorting: [],
      ajax: base_url+"admin/side-bar",
      columns: [
     
    { data: 'id', name: 'id' },
    { data: 'name', name: 'name' },

    { data: 'position', name: 'position' },
    { data: 'status', name: 'status' },
    { data: 'actions', name: 'actions' }
      ],
    //   order: [[ 2, 'asc' ]],
      pageLength: 100,
      rowReorder: {
          selector: 'tr td:not(:first-of-type,:last-of-type)',
          dataSrc: 'position'
      },
    };
    let datatable = $('.datatable-Country').DataTable(dtOverrideGlobals);
    //   $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
     
    //       $($.fn.dataTable.tables(true)).DataTable()
    //           .columns.adjust();
    //   });
    
      datatable.on('row-reorder', function (e, details) {
        
          if(details.length) {
              let rows = [];
              details.forEach(element => {
                  rows.push({
                      id: datatable.row(element.node).data().id,
                      position: element.newData
                  });
              });
    
              $.ajax({
               
                  method: 'POST',
                  url: base_url+'admin/side-bar/reorder',
                  data: { rows }
              }).done(function () { datatable.ajax.reload() });
          }
      });
    });
    