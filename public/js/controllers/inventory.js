angular.module('inventoryApp', ['angularUtils.directives.dirPagination'])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/inventory/get')
            .then(function (data) {
                $scope.inventories = data.data;
            }, function (error) {
                console.log(error)
            });


        $scope.add = function () {
            $scope.loader = true;
            var post = {
                name: $scope.name,
                description: $scope.description,
                quantity: $scope.quantity,
                type: $scope.type
            };

            $http.post('/api/inventory/add', post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addInventoryForm').trigger('reset');
                    $http.get('/api/inventory/get')
                        .then(function (data) {
                            $scope.inventories = data.data;
                        }, function (error) {
                            console.log(error)
                        });
                }, function (error) {
                    $scope.loader = false;
                    swal('', Object.values(error.data)[0], 'error');
                })

        };
        $scope.open = function (inventory) {
            console.log(inventory)
        };
        $scope.edit = function (inventory) {
            $('#editModal').modal('show');
            $scope.inventoryE = inventory;

            $scope.updateInventory = function () {
                $scope.loader = true;

                var post = {
                    id: $scope.inventoryE.id,
                    name: $scope.inventoryE.name,
                    description: $scope.inventoryE.description,
                    quantity: $scope.inventoryE.quantity,
                    type: $scope.inventoryE.type

                };

                $http.post('/api/inventory/update', post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;
                        $http.get('/api/inventory/get')
                            .then(function (data) {
                                $scope.inventory = data.data;
                            }, function (error) {
                                console.log(error)
                            });


                    }, function (error) {
                        swal('', Object.values(error.data)[0], 'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.info = function(inventory){
            $('#infoModal').modal('show');
            $scope.inventoryE = inventory;
        };
        $scope.delete = function (inventory) {
            swal({
                    title: "DELETE INVENTORY?",
                    text: "Name - " + inventory.name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true,
                },
                function () {
                    var post = {
                        id: inventory.id
                    };
                    $http.post('/api/inventory/delete', post)
                        .then(function (data) {
                            swal('', data.data, 'success');
                            $http.get('/api/inventory/get')
                                .then(function (data) {
                                    $scope.inventories = data.data;
                                }, function (error) {
                                    console.log(error)
                                });
                        }, function (error) {
                            console.log(error)
                        });
                });
            console.log(inventory)
        };
        $scope.closeEdit = function () {
            $('#editInventoryForm').trigger('reset');
            $scope.inventoryE = [];
            $http.get('/api/inventory/get')
                .then(function (data) {
                    $scope.inventories = data.data;
                }, function (error) {
                    console.log(error)
                });
        }
    }]);



