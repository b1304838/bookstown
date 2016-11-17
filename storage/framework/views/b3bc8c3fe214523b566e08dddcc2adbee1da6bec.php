<?php $__env->startSection('title', 'JTABLE'); ?>
<?php $__env->startSection('header', 'JTABLE'); ?>

<?php $__env->startSection('content'); ?>
    <div class="table-responsive">
	   <div id="MyTableContainer"></div>
    </div>
	<script type="text/javascript">
    $(document).ready(function () {         
       $('#MyTableContainer').jtable({
            title: 'Books List',
            paging: true, //Enable paging
            pageSize: 10, //Set page size (default: 10)
            sorting: true, //Enable sorting
            //defaultSorting: 'Name ASC', //Set default sorting
            //General options comes here
            openChildAsAccordion: true,
            actions: {
                listAction: function (postData, jtParams) {
    return {
        "Result": "OK",
        "Records": <?php echo App\Book::all()->toJson(); ?>,
        "TotalRecordCount": <?php echo e(App\Book::all()->count()); ?>

    };
}
            },
            fields: {
            	book_id: {
                    key: true,
                    title: 'Mã sách',
                    create: false,
                    edit: false,
                    list: true
                },
                name: {
                    title: 'Tên sách',
                    width: '23%'
                },
                author: {
                    title: 'Tác giả',
                    width: '23%'
                },
                publisher: {
                    title: 'NXB',
                    width: '23%'
                },

                price: {
                    title: 'Giá',
                    width: '5%',
                    sorting: false,
                    edit: false,
                    create: false,

                    display: function (studentData) {
                        var $btn = $('<button class="btn btn-xs">aaa</button>');
                        $btn.click(function () {
                            var data = studentData.record.book_id;
                            $('#MyTableContainer').jtable('openChildTable',
                                    $btn.closest('tr'), //Parent row
                                    {
                                    title: 'test',
                                    actions: {
                                        listAction: function (postData, jtParams) {
                                            // return {
                                            //     "Result": "OK",
                                            //     "Records": <?php echo App\Book::all()->toJson(); ?>,
                                            //     "TotalRecordCount": <?php echo e(App\Book::all()->count()); ?>

                                            // };
                                            return $.Deferred(function ($dfd) {
        $.ajax({
            url: 'postJtable',
            // type: 'POST',
            dataType: 'json',
            data: { postData: data },
            success: function (data) {
                $dfd.resolve(data);
            },
            error: function () {
                $dfd.reject();
            }
        });
    });
                                        }
                                    },
                                    fields: {
                                            book_id: {
                                                key: true,
                                                title: 'Mã sách',
                                                create: false,
                                                edit: false,
                                                list: true
                                            },
                                            orderid: {
                                                title: 'Tên sách',
                                                width: '23%'
                                            }
                                    }
                                }, function (data) { //opened handler
                                    data.childTable.jtable('load');
                                });
                        });
                        //Return image to show on the person row
                        return $btn;
                    }
                }

            }
 
            //Event handlers...

        }); 
        $('#MyTableContainer').jtable('load');    
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>