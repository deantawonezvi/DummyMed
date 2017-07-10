angular.module('patientsApp', ['angularUtils.directives.dirPagination'])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/patient/get')
            .then(function (data) {
                $scope.patients = data.data;
            }, function (error) {
                console.log(error)
            });


        $scope.add = function () {
            $scope.loader = true;
            var post = {
                first_name: $scope.first_name,
                last_name: $scope.last_name,
                sex: $scope.sex,
                date_of_birth: $scope.date_of_birth,
                patient_number:'000000',
                active:true
            };

            $http.post('/api/patient/add', post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addCraneForm').trigger('reset');
                    $http.get('/api/patient/get')
                        .then(function (data) {
                            $scope.patients = data.data;
                        }, function (error) {
                            console.log(error)
                        });
                }, function (error) {
                    $scope.loader = false;
                    swal('', Object.values(error.data)[0], 'error');
                })

        };
        $scope.open = function (patient) {
            console.log(patient)
        };
        $scope.edit = function (patient) {
            $('#editModal').modal('show');
            $scope.patientE = patient;

            $scope.updatePatient = function () {
                $scope.loader = true;

                var post = {
                    id: $scope.patientE.id,
                    first_name: $scope.patientE.first_name,
                    last_name: $scope.patientE.last_name,
                    sex: $scope.patientE.sex,
                    date_of_birth: $scope.patientE.date_of_birth,
                    active: $scope.patientE.active,
                    patient_number: $scope.patientE.patient_number
                };

                $http.post('/api/patient/update', post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;
                        $http.get('/api/patient/get')
                            .then(function (data) {
                                $scope.patients = data.data;
                            }, function (error) {
                                console.log(error)
                            });


                    }, function (error) {
                        swal('', Object.values(error.data)[0], 'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.info = function(patient){
            $('#infoModal').modal('show');
            $scope.patientE = patient;
        };
        $scope.delete = function (patient) {
            swal({
                    title: "DELETE PATIENT?",
                    text: "Name - " + patient.first_name + ' ' + patient.last_name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true,
                },
                function () {
                    var post = {
                        id: patient.id
                    };
                    $http.post('/api/patient/delete', post)
                        .then(function (data) {
                            swal('', data.data, 'success');
                            $http.get('/api/patient/get')
                                .then(function (data) {
                                    $scope.patients = data.data;
                                }, function (error) {
                                    console.log(error)
                                });
                        }, function (error) {
                            console.log(error)
                        });
                });
            console.log(patient)
        };
        $scope.closeEdit = function () {
            $('#editCraneForm').trigger('reset');
            $scope.patientE = [];
            $http.get('/api/patient/get')
                .then(function (data) {
                    $scope.patients = data.data;
                }, function (error) {
                    console.log(error)
                });
        }
    }]);



