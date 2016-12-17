/**
|---------------------------------------------------------------------------------------------------------------------------
|                                               ROUTING                                                                     |
|---------------------------------------------------------------------------------------------------------------------------
*/
 app.config(function($routeProvider) {
     
        
            $routeProvider
            // dashvoard
            .when("/", {
                templateUrl : "<?=base_url('A_project')?>",
                controller  : "projectctrl"
            })

                .when("/detail-project/:id", {
                    templateUrl : "<?=base_url('A_project/view_detail_project')?>",
                    controller  : "detailprojectctrl"
                })
         	
         	.when("/suplier", {
                templateUrl : "<?=base_url('A_suplier')?>",
                controller  : "suplierctrl"
            })

         	.when("/user", {
                templateUrl : "<?=base_url('A_user')?>",
                controller  : "userctrl"
            })


            .when("/kontak", {
                templateUrl : "<?=base_url('A_kontak')?>",
                controller  : "userctrl"
            })

            .when("/profile", {
                templateUrl : "<?=base_url('A_profile')?>"
                // controller  : "profilectrl"
            })

            .when("/errorpage", {
                templateUrl : "<?=base_url('A_tambahan')?>"
            })
            
            .otherwise({ redirectTo: '/errorpage' });

           
        
 });