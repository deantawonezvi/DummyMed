<div class="container" ng-app="patientsApp" ng-cloak>
    <div class="center">
        <img src="img/medical/svg/heart.svg" alt="patient" width="10%">
    </div>

    <div class="banner shadow-1" style="margin-top: 50px;">
        <h2>
            <a class="red-text" href="/"><i class="fa fa-home"></i> Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Patients</span>
        </h2>
    </div>

    <hr class="divider-icon">
    <div>
        <a class="btn btn-flat" href="/appointments"><i class="fa fa-calendar"></i> APPOINTMENTS</a>
    </div>
    <hr>
    <div class="row" ng-controller="mainCtrl">
        <div class="col-sm-12">
            <div class="card-large card-default card-body">

                <h3 class="left"><a href="" class="clickable"><i class="fa fa-search"></i></a> PATIENTS
                    [{{patients.length}}]</h3>

                <h3 class="right"><a class="clickable" data-toggle="modal" data-target="#myModal"><i
                                class="fa fa-plus-circle red-text"></i></a></h3>
                <br><br><br>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>
                            Patient Number
                        </th>
                        <th>
                            First Name
                        </th>
                        <th>
                            Last Name
                        </th>
                        <th>
                            Sex
                        </th>
                        <th>
                            Date Of Birth
                        </th>
                        <th>
                            Status
                        </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr dir-paginate="patient in patients | itemsPerPage:15" ng-dblclick="open(patient)">
                        <td>
                            {{patient.patient_number}}
                        </td>
                        <td>
                            {{patient.first_name}}
                        </td>
                        <td>
                            {{patient.last_name}}
                        </td>
                        <td>
                            {{patient.sex}}
                        </td>
                        <td>
                            {{patient.date_of_birth | date}}
                        </td>
                        <td>
                            {{patient.active}}
                        </td>

                        <td class="right">
                            <button class="btn blue white-text" ng-click="info(patient)"><i
                                        class="fa fa-info-circle"></i>
                            </button>
                            <button class="btn green white-text" ng-click="edit(patient)"><i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn red darken-4 white-text" ng-click="delete(patient)"><i
                                        class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    </tbody>

                </table>
                <center>
                    <dir-pagination-controls
                            max-size="15"
                            direction-links="true"
                            boundary-links="true">
                    </dir-pagination-controls>
                </center>


            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ADD PATIENT</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addPatientForm" ng-submit="add()">
                            <div class="form-group">
                                <label for="name">First Name:</label>
                                <input type="text" class="form-control" id="name" ng-model="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Last Name:</label>
                                <input type="text" class="form-control" id="model" ng-model="last_name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="sex">Sex:</label>
                                <select name="sex" id="sex" class="form-control" ng-model="sex">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date Of Birth:</label>
                                <input type="text" class="form-control date-picker" id="date_of_birth"
                                       ng-model="date_of_birth"
                                       required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary red white-text">Save
                            changes <i ng-show="loader" class="fa fa-spin fa-spinner"></i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Edit Patient Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDIT PATIENT</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editPatientForm" ng-submit="updatePatient()">
                            <div class="form-group">
                                <label for="name">First Name:</label>
                                <input type="text" class="form-control" id="name" ng-model="patientE.first_name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name:</label>
                                <input type="text" class="form-control" id="name" ng-model="patientE.last_name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Date Of Birth:</label>
                                <input type="text" class="form-control date-picker" id="model"
                                       ng-model="patientE.date_of_birth"
                                       required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" ng-click="closeEdit()"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary red white-text">Save changes <i
                                    ng-show="loader" class="fa fa-spin fa-spinner"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--Patient Info Modal-->
        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><img src="img/medical/svg/heart.svg" alt="patient"
                                                                       width="7%">
                             PATIENT INFORMATION</h4>
                    </div>
                    <div class="modal-body">
                        <h2>
                            PATIENT NUMBER: <span class="blue-text">{{patientE.patient_number}}</span><br>
                            NAME: <span class="blue-text">{{patientE.first_name + ' ' + patientE.last_name | uppercase}}</span><br>
                            DATE OF BIRTH: <span class="blue-text">{{patientE.date_of_birth | date }}</span><br>
                            SEX: <span class="blue-text">{{patientE.sex}}</span><br>
                        </h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" ng-click="closeEdit()"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-default purple white-text" ng-click="closeEdit()"
                                >View Track Record
                        </button>
                        <button type="button" class="btn btn-default cyan white-text" ng-click="closeEdit()"
                                >Set Appointment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
