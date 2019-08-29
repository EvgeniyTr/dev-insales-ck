<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setRoutes(
    unserialize(base64_decode('TzozNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlQ29sbGVjdGlvbiI6NDp7czo5OiIAKgByb3V0ZXMiO2E6Mzp7czo0OiJQT1NUIjthOjM6e3M6Mjk6IndlYmhvb2tzL3t1c2VyfS9vcmRlcnMvdXBkYXRlIjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czoyOToid2ViaG9va3Mve3VzZXJ9L29yZGVycy91cGRhdGUiO3M6NzoibWV0aG9kcyI7YToxOntpOjA7czo0OiJQT1NUIjt9czo2OiJhY3Rpb24iO2E6Nzp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJhcGkiO31zOjQ6InVzZXMiO3M6ODA6IkFwcFxIdHRwXENvbnRyb2xsZXJzXFJlY2VpcHRHZW5lcmF0b3JDb250cm9sbGVyQGdlbmVyYXRlSW5jb21lUmVjZWlwdEZyb21XZWJob29rIjtzOjEwOiJjb250cm9sbGVyIjtzOjgwOiJBcHBcSHR0cFxDb250cm9sbGVyc1xSZWNlaXB0R2VuZXJhdG9yQ29udHJvbGxlckBnZW5lcmF0ZUluY29tZVJlY2VpcHRGcm9tV2ViaG9vayI7czoyOiJhcyI7czoyMjoicmVjZWlwdC5pbmNvbWUtd2ViaG9vayI7czo5OiJuYW1lc3BhY2UiO3M6MjA6IkFwcFxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7TjtzOjU6IndoZXJlIjthOjA6e319czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6NDUyOnthOjg6e3M6NDoidmFycyI7YToxOntpOjA7czo0OiJ1c2VyIjt9czoxMToicGF0aF9wcmVmaXgiO3M6OToiL3dlYmhvb2tzIjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjQ3OiIjXi93ZWJob29rcy8oP1A8dXNlcj5bXi9dKyspL29yZGVycy91cGRhdGUkI3NEdSI7czoxMToicGF0aF90b2tlbnMiO2E6Mzp7aTowO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6MTQ6Ii9vcmRlcnMvdXBkYXRlIjt9aToxO2E6NTp7aTowO3M6ODoidmFyaWFibGUiO2k6MTtzOjE6Ii8iO2k6MjtzOjY6IlteL10rKyI7aTozO3M6NDoidXNlciI7aTo0O2I6MTt9aToyO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6OToiL3dlYmhvb2tzIjt9fXM6OToicGF0aF92YXJzIjthOjE6e2k6MDtzOjQ6InVzZXIiO31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19czozNzoid2lkZ2V0L3t1c2VyfS9nZW5lcmF0ZS1pbmNvbWUtcmVjZWlwdCI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6Mzc6IndpZGdldC97dXNlcn0vZ2VuZXJhdGUtaW5jb21lLXJlY2VpcHQiO3M6NzoibWV0aG9kcyI7YToxOntpOjA7czo0OiJQT1NUIjt9czo2OiJhY3Rpb24iO2E6Nzp7czoxMDoibWlkZGxld2FyZSI7YToyOntpOjA7czozOiJhcGkiO2k6MTtzOjQ6ImNvcnMiO31zOjQ6InVzZXMiO3M6Njk6IkFwcFxIdHRwXENvbnRyb2xsZXJzXFJlY2VpcHRHZW5lcmF0b3JDb250cm9sbGVyQGdlbmVyYXRlSW5jb21lUmVjZWlwdCI7czoxMDoiY29udHJvbGxlciI7czo2OToiQXBwXEh0dHBcQ29udHJvbGxlcnNcUmVjZWlwdEdlbmVyYXRvckNvbnRyb2xsZXJAZ2VuZXJhdGVJbmNvbWVSZWNlaXB0IjtzOjI6ImFzIjtzOjE0OiJyZWNlaXB0LmluY29tZSI7czo5OiJuYW1lc3BhY2UiO3M6MjA6IkFwcFxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7TjtzOjU6IndoZXJlIjthOjA6e319czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6NDY4OnthOjg6e3M6NDoidmFycyI7YToxOntpOjA7czo0OiJ1c2VyIjt9czoxMToicGF0aF9wcmVmaXgiO3M6NzoiL3dpZGdldCI7czoxMDoicGF0aF9yZWdleCI7czo1NzoiI14vd2lkZ2V0Lyg/UDx1c2VyPlteL10rKykvZ2VuZXJhdGVcLWluY29tZVwtcmVjZWlwdCQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YTozOntpOjA7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czoyNDoiL2dlbmVyYXRlLWluY29tZS1yZWNlaXB0Ijt9aToxO2E6NTp7aTowO3M6ODoidmFyaWFibGUiO2k6MTtzOjE6Ii8iO2k6MjtzOjY6IlteL10rKyI7aTozO3M6NDoidXNlciI7aTo0O2I6MTt9aToyO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6NzoiL3dpZGdldCI7fX1zOjk6InBhdGhfdmFycyI7YToxOntpOjA7czo0OiJ1c2VyIjt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fXM6NDQ6IndpZGdldC97dXNlcn0vZ2VuZXJhdGUtaW5jb21lLXJldHVybi1yZWNlaXB0IjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czo0NDoid2lkZ2V0L3t1c2VyfS9nZW5lcmF0ZS1pbmNvbWUtcmV0dXJuLXJlY2VpcHQiO3M6NzoibWV0aG9kcyI7YToxOntpOjA7czo0OiJQT1NUIjt9czo2OiJhY3Rpb24iO2E6Nzp7czoxMDoibWlkZGxld2FyZSI7YToyOntpOjA7czozOiJhcGkiO2k6MTtzOjQ6ImNvcnMiO31zOjQ6InVzZXMiO3M6NzU6IkFwcFxIdHRwXENvbnRyb2xsZXJzXFJlY2VpcHRHZW5lcmF0b3JDb250cm9sbGVyQGdlbmVyYXRlSW5jb21lUmV0dXJuUmVjZWlwdCI7czoxMDoiY29udHJvbGxlciI7czo3NToiQXBwXEh0dHBcQ29udHJvbGxlcnNcUmVjZWlwdEdlbmVyYXRvckNvbnRyb2xsZXJAZ2VuZXJhdGVJbmNvbWVSZXR1cm5SZWNlaXB0IjtzOjI6ImFzIjtzOjIxOiJyZWNlaXB0LmluY29tZS1yZXR1cm4iO3M6OToibmFtZXNwYWNlIjtzOjIwOiJBcHBcSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO047czo1OiJ3aGVyZSI7YTowOnt9fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjQ4Mzp7YTo4OntzOjQ6InZhcnMiO2E6MTp7aTowO3M6NDoidXNlciI7fXM6MTE6InBhdGhfcHJlZml4IjtzOjc6Ii93aWRnZXQiO3M6MTA6InBhdGhfcmVnZXgiO3M6NjU6IiNeL3dpZGdldC8oP1A8dXNlcj5bXi9dKyspL2dlbmVyYXRlXC1pbmNvbWVcLXJldHVyblwtcmVjZWlwdCQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YTozOntpOjA7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czozMToiL2dlbmVyYXRlLWluY29tZS1yZXR1cm4tcmVjZWlwdCI7fWk6MTthOjU6e2k6MDtzOjg6InZhcmlhYmxlIjtpOjE7czoxOiIvIjtpOjI7czo2OiJbXi9dKysiO2k6MztzOjQ6InVzZXIiO2k6NDtiOjE7fWk6MjthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjc6Ii93aWRnZXQiO319czo5OiJwYXRoX3ZhcnMiO2E6MTp7aTowO3M6NDoidXNlciI7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX19czozOiJHRVQiO2E6MTg6e3M6NzoiaW5zdGFsbCI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6NzoiaW5zdGFsbCI7czo3OiJtZXRob2RzIjthOjI6e2k6MDtzOjM6IkdFVCI7aToxO3M6NDoiSEVBRCI7fXM6NjoiYWN0aW9uIjthOjY6e3M6MTA6Im1pZGRsZXdhcmUiO2E6MTp7aTowO3M6Mzoid2ViIjt9czo0OiJ1c2VzIjtzOjMyOiJBcHBcSHR0cFxDb250cm9sbGVyc1xJbnN0YWxsQGdldCI7czoxMDoiY29udHJvbGxlciI7czozMjoiQXBwXEh0dHBcQ29udHJvbGxlcnNcSW5zdGFsbEBnZXQiO3M6OToibmFtZXNwYWNlIjtzOjIwOiJBcHBcSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO047czo1OiJ3aGVyZSI7YTowOnt9fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjI1Njp7YTo4OntzOjQ6InZhcnMiO2E6MDp7fXM6MTE6InBhdGhfcHJlZml4IjtzOjg6Ii9pbnN0YWxsIjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjE1OiIjXi9pbnN0YWxsJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjg6Ii9pbnN0YWxsIjt9fXM6OToicGF0aF92YXJzIjthOjA6e31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19czo5OiJ1bmluc3RhbGwiO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjk6InVuaW5zdGFsbCI7czo3OiJtZXRob2RzIjthOjI6e2k6MDtzOjM6IkdFVCI7aToxO3M6NDoiSEVBRCI7fXM6NjoiYWN0aW9uIjthOjY6e3M6MTA6Im1pZGRsZXdhcmUiO2E6MTp7aTowO3M6Mzoid2ViIjt9czo0OiJ1c2VzIjtzOjM0OiJBcHBcSHR0cFxDb250cm9sbGVyc1xVbmluc3RhbGxAZ2V0IjtzOjEwOiJjb250cm9sbGVyIjtzOjM0OiJBcHBcSHR0cFxDb250cm9sbGVyc1xVbmluc3RhbGxAZ2V0IjtzOjk6Im5hbWVzcGFjZSI7czoyMDoiQXBwXEh0dHBcQ29udHJvbGxlcnMiO3M6NjoicHJlZml4IjtOO3M6NToid2hlcmUiO2E6MDp7fX1zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjoyNjQ6e2E6ODp7czo0OiJ2YXJzIjthOjA6e31zOjExOiJwYXRoX3ByZWZpeCI7czoxMDoiL3VuaW5zdGFsbCI7czoxMDoicGF0aF9yZWdleCI7czoxNzoiI14vdW5pbnN0YWxsJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjEwOiIvdW5pbnN0YWxsIjt9fXM6OToicGF0aF92YXJzIjthOjA6e31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19czo5OiJhdXRvbG9naW4iO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjk6ImF1dG9sb2dpbiI7czo3OiJtZXRob2RzIjthOjI6e2k6MDtzOjM6IkdFVCI7aToxO3M6NDoiSEVBRCI7fXM6NjoiYWN0aW9uIjthOjc6e3M6MTA6Im1pZGRsZXdhcmUiO2E6MTp7aTowO3M6Mzoid2ViIjt9czo0OiJ1c2VzIjtzOjU1OiJBcHBcSHR0cFxDb250cm9sbGVyc1xBdXRoXEF1dG9sb2dpbkNvbnRyb2xsZXJAYXV0b2xvZ2luIjtzOjEwOiJjb250cm9sbGVyIjtzOjU1OiJBcHBcSHR0cFxDb250cm9sbGVyc1xBdXRoXEF1dG9sb2dpbkNvbnRyb2xsZXJAYXV0b2xvZ2luIjtzOjk6Im5hbWVzcGFjZSI7czoyMDoiQXBwXEh0dHBcQ29udHJvbGxlcnMiO3M6NjoicHJlZml4IjtOO3M6NToid2hlcmUiO2E6MDp7fXM6MjoiYXMiO3M6MTM6ImFwcC5hdXRvbG9naW4iO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjoyNjQ6e2E6ODp7czo0OiJ2YXJzIjthOjA6e31zOjExOiJwYXRoX3ByZWZpeCI7czoxMDoiL2F1dG9sb2dpbiI7czoxMDoicGF0aF9yZWdleCI7czoxNzoiI14vYXV0b2xvZ2luJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjEwOiIvYXV0b2xvZ2luIjt9fXM6OToicGF0aF92YXJzIjthOjA6e31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19czo3OiJpbnNhbGVzIjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czo3OiJpbnNhbGVzIjtzOjc6Im1ldGhvZHMiO2E6Mjp7aTowO3M6MzoiR0VUIjtpOjE7czo0OiJIRUFEIjt9czo2OiJhY3Rpb24iO2E6Nzp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6NDg6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEF1dGhcTG9naW5Db250cm9sbGVyQGxvZ291dCI7czoxMDoiY29udHJvbGxlciI7czo0ODoiQXBwXEh0dHBcQ29udHJvbGxlcnNcQXV0aFxMb2dpbkNvbnRyb2xsZXJAbG9nb3V0IjtzOjk6Im5hbWVzcGFjZSI7czoyMDoiQXBwXEh0dHBcQ29udHJvbGxlcnMiO3M6NjoicHJlZml4IjtOO3M6NToid2hlcmUiO2E6MDp7fXM6MjoiYXMiO3M6MTM6ImN1c3RvbS5sb2dvdXQiO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjoyNTY6e2E6ODp7czo0OiJ2YXJzIjthOjA6e31zOjExOiJwYXRoX3ByZWZpeCI7czo4OiIvaW5zYWxlcyI7czoxMDoicGF0aF9yZWdleCI7czoxNToiI14vaW5zYWxlcyQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YToxOntpOjA7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czo4OiIvaW5zYWxlcyI7fX1zOjk6InBhdGhfdmFycyI7YTowOnt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fXM6NDoiaG9tZSI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6NDoiaG9tZSI7czo3OiJtZXRob2RzIjthOjI6e2k6MDtzOjM6IkdFVCI7aToxO3M6NDoiSEVBRCI7fXM6NjoiYWN0aW9uIjthOjc6e3M6MTA6Im1pZGRsZXdhcmUiO2E6Mjp7aTowO3M6Mzoid2ViIjtpOjE7czoxMDoiYXV0aC5jaGVjayI7fXM6NDoidXNlcyI7czozMzoiQXBwXEh0dHBcQ29udHJvbGxlcnNcU2V0dGluZ3NAZ2V0IjtzOjEwOiJjb250cm9sbGVyIjtzOjMzOiJBcHBcSHR0cFxDb250cm9sbGVyc1xTZXR0aW5nc0BnZXQiO3M6OToibmFtZXNwYWNlIjtzOjIwOiJBcHBcSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO047czo1OiJ3aGVyZSI7YTowOnt9czoyOiJhcyI7czo0OiJob21lIjt9czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6MjQ3OnthOjg6e3M6NDoidmFycyI7YTowOnt9czoxMToicGF0aF9wcmVmaXgiO3M6NToiL2hvbWUiO3M6MTA6InBhdGhfcmVnZXgiO3M6MTI6IiNeL2hvbWUkI3NEdSI7czoxMToicGF0aF90b2tlbnMiO2E6MTp7aTowO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6NToiL2hvbWUiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjExOiJzZXR0aW5ncy1qcyI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6MTE6InNldHRpbmdzLWpzIjtzOjc6Im1ldGhvZHMiO2E6Mjp7aTowO3M6MzoiR0VUIjtpOjE7czo0OiJIRUFEIjt9czo2OiJhY3Rpb24iO2E6Njp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6MzU6IkFwcFxIdHRwXENvbnRyb2xsZXJzXFNldHRpbmdzQGdldEpTIjtzOjEwOiJjb250cm9sbGVyIjtzOjM1OiJBcHBcSHR0cFxDb250cm9sbGVyc1xTZXR0aW5nc0BnZXRKUyI7czo5OiJuYW1lc3BhY2UiO3M6MjA6IkFwcFxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7TjtzOjU6IndoZXJlIjthOjA6e319czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6MjcxOnthOjg6e3M6NDoidmFycyI7YTowOnt9czoxMToicGF0aF9wcmVmaXgiO3M6MTI6Ii9zZXR0aW5ncy1qcyI7czoxMDoicGF0aF9yZWdleCI7czoyMDoiI14vc2V0dGluZ3NcLWpzJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjEyOiIvc2V0dGluZ3MtanMiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjU6InNldHVwIjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czo1OiJzZXR1cCI7czo3OiJtZXRob2RzIjthOjI6e2k6MDtzOjM6IkdFVCI7aToxO3M6NDoiSEVBRCI7fXM6NjoiYWN0aW9uIjthOjY6e3M6MTA6Im1pZGRsZXdhcmUiO2E6Mjp7aTowO3M6Mzoid2ViIjtpOjE7czoxMDoiYXV0aC5jaGVjayI7fXM6NDoidXNlcyI7czozOToiQXBwXEh0dHBcQ29udHJvbGxlcnNcRmlyc3RUaW1lU2V0dXBAZ2V0IjtzOjEwOiJjb250cm9sbGVyIjtzOjM5OiJBcHBcSHR0cFxDb250cm9sbGVyc1xGaXJzdFRpbWVTZXR1cEBnZXQiO3M6OToibmFtZXNwYWNlIjtzOjIwOiJBcHBcSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO047czo1OiJ3aGVyZSI7YTowOnt9fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjI1MDp7YTo4OntzOjQ6InZhcnMiO2E6MDp7fXM6MTE6InBhdGhfcHJlZml4IjtzOjY6Ii9zZXR1cCI7czoxMDoicGF0aF9yZWdleCI7czoxMzoiI14vc2V0dXAkI3NEdSI7czoxMToicGF0aF90b2tlbnMiO2E6MTp7aTowO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6NjoiL3NldHVwIjt9fXM6OToicGF0aF92YXJzIjthOjA6e31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19czoxNDoiZmlyc3RUaW1lU2V0dXAiO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjE0OiJmaXJzdFRpbWVTZXR1cCI7czo3OiJtZXRob2RzIjthOjI6e2k6MDtzOjM6IkdFVCI7aToxO3M6NDoiSEVBRCI7fXM6NjoiYWN0aW9uIjthOjY6e3M6MTA6Im1pZGRsZXdhcmUiO2E6MTp7aTowO3M6Mzoid2ViIjt9czo0OiJ1c2VzIjtzOjQxOiJBcHBcSHR0cFxDb250cm9sbGVyc1xGaXJzdFRpbWVTZXR1cEBnZXRKUyI7czoxMDoiY29udHJvbGxlciI7czo0MToiQXBwXEh0dHBcQ29udHJvbGxlcnNcRmlyc3RUaW1lU2V0dXBAZ2V0SlMiO3M6OToibmFtZXNwYWNlIjtzOjIwOiJBcHBcSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO047czo1OiJ3aGVyZSI7YTowOnt9fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjI3OTp7YTo4OntzOjQ6InZhcnMiO2E6MDp7fXM6MTE6InBhdGhfcHJlZml4IjtzOjE1OiIvZmlyc3RUaW1lU2V0dXAiO3M6MTA6InBhdGhfcmVnZXgiO3M6MjI6IiNeL2ZpcnN0VGltZVNldHVwJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjE1OiIvZmlyc3RUaW1lU2V0dXAiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjEzOiJjb21wbGV0ZVNldHVwIjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czoxMzoiY29tcGxldGVTZXR1cCI7czo3OiJtZXRob2RzIjthOjI6e2k6MDtzOjM6IkdFVCI7aToxO3M6NDoiSEVBRCI7fXM6NjoiYWN0aW9uIjthOjY6e3M6MTA6Im1pZGRsZXdhcmUiO2E6MTp7aTowO3M6Mzoid2ViIjt9czo0OiJ1c2VzIjtzOjM5OiJBcHBcSHR0cFxDb250cm9sbGVyc1xJbml0QGNvbXBsZXRlU2V0dXAiO3M6MTA6ImNvbnRyb2xsZXIiO3M6Mzk6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEluaXRAY29tcGxldGVTZXR1cCI7czo5OiJuYW1lc3BhY2UiO3M6MjA6IkFwcFxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7TjtzOjU6IndoZXJlIjthOjA6e319czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6Mjc2OnthOjg6e3M6NDoidmFycyI7YTowOnt9czoxMToicGF0aF9wcmVmaXgiO3M6MTQ6Ii9jb21wbGV0ZVNldHVwIjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjIxOiIjXi9jb21wbGV0ZVNldHVwJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjE0OiIvY29tcGxldGVTZXR1cCI7fX1zOjk6InBhdGhfdmFycyI7YTowOnt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fXM6NDoiaW5pdCI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6NDoiaW5pdCI7czo3OiJtZXRob2RzIjthOjI6e2k6MDtzOjM6IkdFVCI7aToxO3M6NDoiSEVBRCI7fXM6NjoiYWN0aW9uIjthOjY6e3M6MTA6Im1pZGRsZXdhcmUiO2E6MTp7aTowO3M6Mzoid2ViIjt9czo0OiJ1c2VzIjtzOjMwOiJBcHBcSHR0cFxDb250cm9sbGVyc1xJbml0QGluaXQiO3M6MTA6ImNvbnRyb2xsZXIiO3M6MzA6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEluaXRAaW5pdCI7czo5OiJuYW1lc3BhY2UiO3M6MjA6IkFwcFxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7TjtzOjU6IndoZXJlIjthOjA6e319czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6MjQ3OnthOjg6e3M6NDoidmFycyI7YTowOnt9czoxMToicGF0aF9wcmVmaXgiO3M6NToiL2luaXQiO3M6MTA6InBhdGhfcmVnZXgiO3M6MTI6IiNeL2luaXQkI3NEdSI7czoxMToicGF0aF90b2tlbnMiO2E6MTp7aTowO2E6Mjp7aTowO3M6NDoidGV4dCI7aToxO3M6NToiL2luaXQiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjE0OiJnZXRTZXR1cFN0YXR1cyI7TzoyNDoiSWxsdW1pbmF0ZVxSb3V0aW5nXFJvdXRlIjoxMTp7czozOiJ1cmkiO3M6MTQ6ImdldFNldHVwU3RhdHVzIjtzOjc6Im1ldGhvZHMiO2E6Mjp7aTowO3M6MzoiR0VUIjtpOjE7czo0OiJIRUFEIjt9czo2OiJhY3Rpb24iO2E6Njp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6NDA6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEluaXRAZ2V0U2V0dXBTdGF0dXMiO3M6MTA6ImNvbnRyb2xsZXIiO3M6NDA6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEluaXRAZ2V0U2V0dXBTdGF0dXMiO3M6OToibmFtZXNwYWNlIjtzOjIwOiJBcHBcSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO047czo1OiJ3aGVyZSI7YTowOnt9fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjI3OTp7YTo4OntzOjQ6InZhcnMiO2E6MDp7fXM6MTE6InBhdGhfcHJlZml4IjtzOjE1OiIvZ2V0U2V0dXBTdGF0dXMiO3M6MTA6InBhdGhfcmVnZXgiO3M6MjI6IiNeL2dldFNldHVwU3RhdHVzJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjE1OiIvZ2V0U2V0dXBTdGF0dXMiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjEyOiJzYXZlQ2tTZWNyZXQiO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjEyOiJzYXZlQ2tTZWNyZXQiO3M6NzoibWV0aG9kcyI7YToyOntpOjA7czozOiJHRVQiO2k6MTtzOjQ6IkhFQUQiO31zOjY6ImFjdGlvbiI7YTo2OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czozNDoiQXBwXEh0dHBcQ29udHJvbGxlcnNcQ2tTZWNyZXRAc2F2ZSI7czoxMDoiY29udHJvbGxlciI7czozNDoiQXBwXEh0dHBcQ29udHJvbGxlcnNcQ2tTZWNyZXRAc2F2ZSI7czo5OiJuYW1lc3BhY2UiO3M6MjA6IkFwcFxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7TjtzOjU6IndoZXJlIjthOjA6e319czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6MjczOnthOjg6e3M6NDoidmFycyI7YTowOnt9czoxMToicGF0aF9wcmVmaXgiO3M6MTM6Ii9zYXZlQ2tTZWNyZXQiO3M6MTA6InBhdGhfcmVnZXgiO3M6MjA6IiNeL3NhdmVDa1NlY3JldCQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YToxOntpOjA7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czoxMzoiL3NhdmVDa1NlY3JldCI7fX1zOjk6InBhdGhfdmFycyI7YTowOnt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fXM6MTA6InNhdmVDa1NldHQiO086MjQ6IklsbHVtaW5hdGVcUm91dGluZ1xSb3V0ZSI6MTE6e3M6MzoidXJpIjtzOjEwOiJzYXZlQ2tTZXR0IjtzOjc6Im1ldGhvZHMiO2E6Mjp7aTowO3M6MzoiR0VUIjtpOjE7czo0OiJIRUFEIjt9czo2OiJhY3Rpb24iO2E6Njp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6MzI6IkFwcFxIdHRwXENvbnRyb2xsZXJzXENrU2V0dEBzYXZlIjtzOjEwOiJjb250cm9sbGVyIjtzOjMyOiJBcHBcSHR0cFxDb250cm9sbGVyc1xDa1NldHRAc2F2ZSI7czo5OiJuYW1lc3BhY2UiO3M6MjA6IkFwcFxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7TjtzOjU6IndoZXJlIjthOjA6e319czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6MjY3OnthOjg6e3M6NDoidmFycyI7YTowOnt9czoxMToicGF0aF9wcmVmaXgiO3M6MTE6Ii9zYXZlQ2tTZXR0IjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjE4OiIjXi9zYXZlQ2tTZXR0JCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjExOiIvc2F2ZUNrU2V0dCI7fX1zOjk6InBhdGhfdmFycyI7YTowOnt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fXM6OToic2F2ZUNrVkFUIjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czo5OiJzYXZlQ2tWQVQiO3M6NzoibWV0aG9kcyI7YToyOntpOjA7czozOiJHRVQiO2k6MTtzOjQ6IkhFQUQiO31zOjY6ImFjdGlvbiI7YTo2OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czozMToiQXBwXEh0dHBcQ29udHJvbGxlcnNcQ2tWQVRAc2F2ZSI7czoxMDoiY29udHJvbGxlciI7czozMToiQXBwXEh0dHBcQ29udHJvbGxlcnNcQ2tWQVRAc2F2ZSI7czo5OiJuYW1lc3BhY2UiO3M6MjA6IkFwcFxIdHRwXENvbnRyb2xsZXJzIjtzOjY6InByZWZpeCI7TjtzOjU6IndoZXJlIjthOjA6e319czoxMDoiaXNGYWxsYmFjayI7YjowO3M6MTA6ImNvbnRyb2xsZXIiO047czo4OiJkZWZhdWx0cyI7YTowOnt9czo2OiJ3aGVyZXMiO2E6MDp7fXM6MTA6InBhcmFtZXRlcnMiO047czoxNDoicGFyYW1ldGVyTmFtZXMiO047czoxODoiY29tcHV0ZWRNaWRkbGV3YXJlIjtOO3M6ODoiY29tcGlsZWQiO0M6Mzk6IlN5bWZvbnlcQ29tcG9uZW50XFJvdXRpbmdcQ29tcGlsZWRSb3V0ZSI6MjY0OnthOjg6e3M6NDoidmFycyI7YTowOnt9czoxMToicGF0aF9wcmVmaXgiO3M6MTA6Ii9zYXZlQ2tWQVQiO3M6MTA6InBhdGhfcmVnZXgiO3M6MTc6IiNeL3NhdmVDa1ZBVCQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YToxOntpOjA7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czoxMDoiL3NhdmVDa1ZBVCI7fX1zOjk6InBhdGhfdmFycyI7YTowOnt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fXM6MjM6InNhdmVDS0dhdGV3YXlFeGNlcHRpb25zIjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czoyMzoic2F2ZUNLR2F0ZXdheUV4Y2VwdGlvbnMiO3M6NzoibWV0aG9kcyI7YToyOntpOjA7czozOiJHRVQiO2k6MTtzOjQ6IkhFQUQiO31zOjY6ImFjdGlvbiI7YTo2OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czo0NToiQXBwXEh0dHBcQ29udHJvbGxlcnNcQ0tHYXRld2F5RXhjZXB0aW9uc0BzYXZlIjtzOjEwOiJjb250cm9sbGVyIjtzOjQ1OiJBcHBcSHR0cFxDb250cm9sbGVyc1xDS0dhdGV3YXlFeGNlcHRpb25zQHNhdmUiO3M6OToibmFtZXNwYWNlIjtzOjIwOiJBcHBcSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO047czo1OiJ3aGVyZSI7YTowOnt9fXM6MTA6ImlzRmFsbGJhY2siO2I6MDtzOjEwOiJjb250cm9sbGVyIjtOO3M6ODoiZGVmYXVsdHMiO2E6MDp7fXM6Njoid2hlcmVzIjthOjA6e31zOjEwOiJwYXJhbWV0ZXJzIjtOO3M6MTQ6InBhcmFtZXRlck5hbWVzIjtOO3M6MTg6ImNvbXB1dGVkTWlkZGxld2FyZSI7TjtzOjg6ImNvbXBpbGVkIjtDOjM5OiJTeW1mb255XENvbXBvbmVudFxSb3V0aW5nXENvbXBpbGVkUm91dGUiOjMwNjp7YTo4OntzOjQ6InZhcnMiO2E6MDp7fXM6MTE6InBhdGhfcHJlZml4IjtzOjI0OiIvc2F2ZUNLR2F0ZXdheUV4Y2VwdGlvbnMiO3M6MTA6InBhdGhfcmVnZXgiO3M6MzE6IiNeL3NhdmVDS0dhdGV3YXlFeGNlcHRpb25zJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjI0OiIvc2F2ZUNLR2F0ZXdheUV4Y2VwdGlvbnMiO319czo5OiJwYXRoX3ZhcnMiO2E6MDp7fXM6MTA6Imhvc3RfcmVnZXgiO047czoxMToiaG9zdF90b2tlbnMiO2E6MDp7fXM6OToiaG9zdF92YXJzIjthOjA6e319fX1zOjU6InVzZXJzIjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czo1OiJ1c2VycyI7czo3OiJtZXRob2RzIjthOjI6e2k6MDtzOjM6IkdFVCI7aToxO3M6NDoiSEVBRCI7fXM6NjoiYWN0aW9uIjthOjc6e3M6MTA6Im1pZGRsZXdhcmUiO2E6Mjp7aTowO3M6Mzoid2ViIjtpOjE7czoxMDoiYXV0aC5jaGVjayI7fXM6NDoidXNlcyI7czo0NDoiQXBwXEh0dHBcQ29udHJvbGxlcnNcVXNlcnNDb250cm9sbGVyQHNob3dBbGwiO3M6MTA6ImNvbnRyb2xsZXIiO3M6NDQ6IkFwcFxIdHRwXENvbnRyb2xsZXJzXFVzZXJzQ29udHJvbGxlckBzaG93QWxsIjtzOjk6Im5hbWVzcGFjZSI7czoyMDoiQXBwXEh0dHBcQ29udHJvbGxlcnMiO3M6NjoicHJlZml4IjtOO3M6NToid2hlcmUiO2E6MDp7fXM6MjoiYXMiO3M6NToidXNlcnMiO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjoyNTA6e2E6ODp7czo0OiJ2YXJzIjthOjA6e31zOjExOiJwYXRoX3ByZWZpeCI7czo2OiIvdXNlcnMiO3M6MTA6InBhdGhfcmVnZXgiO3M6MTM6IiNeL3VzZXJzJCNzRHUiO3M6MTE6InBhdGhfdG9rZW5zIjthOjE6e2k6MDthOjI6e2k6MDtzOjQ6InRleHQiO2k6MTtzOjY6Ii91c2VycyI7fX1zOjk6InBhdGhfdmFycyI7YTowOnt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fXM6MTE6Imluc3RydWN0aW9uIjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czoxMToiaW5zdHJ1Y3Rpb24iO3M6NzoibWV0aG9kcyI7YToyOntpOjA7czozOiJHRVQiO2k6MTtzOjQ6IkhFQUQiO31zOjY6ImFjdGlvbiI7YTo3OntzOjEwOiJtaWRkbGV3YXJlIjthOjE6e2k6MDtzOjM6IndlYiI7fXM6NDoidXNlcyI7czo1MToiQXBwXEh0dHBcQ29udHJvbGxlcnNcSG9tZUNvbnRyb2xsZXJAc2hvd0luc3RydWN0aW9uIjtzOjEwOiJjb250cm9sbGVyIjtzOjUxOiJBcHBcSHR0cFxDb250cm9sbGVyc1xIb21lQ29udHJvbGxlckBzaG93SW5zdHJ1Y3Rpb24iO3M6OToibmFtZXNwYWNlIjtzOjIwOiJBcHBcSHR0cFxDb250cm9sbGVycyI7czo2OiJwcmVmaXgiO047czo1OiJ3aGVyZSI7YTowOnt9czoyOiJhcyI7czoxMToiaW5zdHJ1Y3Rpb24iO31zOjEwOiJpc0ZhbGxiYWNrIjtiOjA7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YTowOnt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjoyNzA6e2E6ODp7czo0OiJ2YXJzIjthOjA6e31zOjExOiJwYXRoX3ByZWZpeCI7czoxMjoiL2luc3RydWN0aW9uIjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjE5OiIjXi9pbnN0cnVjdGlvbiQjc0R1IjtzOjExOiJwYXRoX3Rva2VucyI7YToxOntpOjA7YToyOntpOjA7czo0OiJ0ZXh0IjtpOjE7czoxMjoiL2luc3RydWN0aW9uIjt9fXM6OToicGF0aF92YXJzIjthOjA6e31zOjEwOiJob3N0X3JlZ2V4IjtOO3M6MTE6Imhvc3RfdG9rZW5zIjthOjA6e31zOjk6Imhvc3RfdmFycyI7YTowOnt9fX19czoyMToie2ZhbGxiYWNrUGxhY2Vob2xkZXJ9IjtPOjI0OiJJbGx1bWluYXRlXFJvdXRpbmdcUm91dGUiOjExOntzOjM6InVyaSI7czoyMToie2ZhbGxiYWNrUGxhY2Vob2xkZXJ9IjtzOjc6Im1ldGhvZHMiO2E6Mjp7aTowO3M6MzoiR0VUIjtpOjE7czo0OiJIRUFEIjt9czo2OiJhY3Rpb24iO2E6Njp7czoxMDoibWlkZGxld2FyZSI7YToxOntpOjA7czozOiJ3ZWIiO31zOjQ6InVzZXMiO3M6NTE6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEhvbWVDb250cm9sbGVyQHNob3dJbnN0cnVjdGlvbiI7czoxMDoiY29udHJvbGxlciI7czo1MToiQXBwXEh0dHBcQ29udHJvbGxlcnNcSG9tZUNvbnRyb2xsZXJAc2hvd0luc3RydWN0aW9uIjtzOjk6Im5hbWVzcGFjZSI7czoyMDoiQXBwXEh0dHBcQ29udHJvbGxlcnMiO3M6NjoicHJlZml4IjtOO3M6NToid2hlcmUiO2E6MDp7fX1zOjEwOiJpc0ZhbGxiYWNrIjtiOjE7czoxMDoiY29udHJvbGxlciI7TjtzOjg6ImRlZmF1bHRzIjthOjA6e31zOjY6IndoZXJlcyI7YToxOntzOjE5OiJmYWxsYmFja1BsYWNlaG9sZGVyIjtzOjI6Ii4qIjt9czoxMDoicGFyYW1ldGVycyI7TjtzOjE0OiJwYXJhbWV0ZXJOYW1lcyI7TjtzOjE4OiJjb21wdXRlZE1pZGRsZXdhcmUiO047czo4OiJjb21waWxlZCI7QzozOToiU3ltZm9ueVxDb21wb25lbnRcUm91dGluZ1xDb21waWxlZFJvdXRlIjozNzk6e2E6ODp7czo0OiJ2YXJzIjthOjE6e2k6MDtzOjE5OiJmYWxsYmFja1BsYWNlaG9sZGVyIjt9czoxMToicGF0aF9wcmVmaXgiO3M6MDoiIjtzOjEwOiJwYXRoX3JlZ2V4IjtzOjM1OiIjXi8oP1A8ZmFsbGJhY2tQbGFjZWhvbGRlcj4uKikkI3NEdSI7czoxMToicGF0aF90b2tlbnMiO2E6MTp7aTowO2E6NTp7aTowO3M6ODoidmFyaWFibGUiO2k6MTtzOjE6Ii8iO2k6MjtzOjI6Ii4qIjtpOjM7czoxOToiZmFsbGJhY2tQbGFjZWhvbGRlciI7aTo0O2I6MTt9fXM6OToicGF0aF92YXJzIjthOjE6e2k6MDtzOjE5OiJmYWxsYmFja1BsYWNlaG9sZGVyIjt9czoxMDoiaG9zdF9yZWdleCI7TjtzOjExOiJob3N0X3Rva2VucyI7YTowOnt9czo5OiJob3N0X3ZhcnMiO2E6MDp7fX19fX1zOjQ6IkhFQUQiO2E6MTg6e3M6NzoiaW5zdGFsbCI7cjoxMzk7czo5OiJ1bmluc3RhbGwiO3I6MTcyO3M6OToiYXV0b2xvZ2luIjtyOjIwNTtzOjc6Imluc2FsZXMiO3I6MjM5O3M6NDoiaG9tZSI7cjoyNzM7czoxMToic2V0dGluZ3MtanMiO3I6MzA4O3M6NToic2V0dXAiO3I6MzQxO3M6MTQ6ImZpcnN0VGltZVNldHVwIjtyOjM3NTtzOjEzOiJjb21wbGV0ZVNldHVwIjtyOjQwODtzOjQ6ImluaXQiO3I6NDQxO3M6MTQ6ImdldFNldHVwU3RhdHVzIjtyOjQ3NDtzOjEyOiJzYXZlQ2tTZWNyZXQiO3I6NTA3O3M6MTA6InNhdmVDa1NldHQiO3I6NTQwO3M6OToic2F2ZUNrVkFUIjtyOjU3MztzOjIzOiJzYXZlQ0tHYXRld2F5RXhjZXB0aW9ucyI7cjo2MDY7czo1OiJ1c2VycyI7cjo2Mzk7czoxMToiaW5zdHJ1Y3Rpb24iO3I6Njc0O3M6MjE6IntmYWxsYmFja1BsYWNlaG9sZGVyfSI7cjo3MDg7fX1zOjEyOiIAKgBhbGxSb3V0ZXMiO2E6MjE6e3M6MzM6IlBPU1R3ZWJob29rcy97dXNlcn0vb3JkZXJzL3VwZGF0ZSI7cjo0O3M6NDE6IlBPU1R3aWRnZXQve3VzZXJ9L2dlbmVyYXRlLWluY29tZS1yZWNlaXB0IjtyOjQ4O3M6NDg6IlBPU1R3aWRnZXQve3VzZXJ9L2dlbmVyYXRlLWluY29tZS1yZXR1cm4tcmVjZWlwdCI7cjo5MztzOjExOiJIRUFEaW5zdGFsbCI7cjoxMzk7czoxMzoiSEVBRHVuaW5zdGFsbCI7cjoxNzI7czoxMzoiSEVBRGF1dG9sb2dpbiI7cjoyMDU7czoxMToiSEVBRGluc2FsZXMiO3I6MjM5O3M6ODoiSEVBRGhvbWUiO3I6MjczO3M6MTU6IkhFQURzZXR0aW5ncy1qcyI7cjozMDg7czo5OiJIRUFEc2V0dXAiO3I6MzQxO3M6MTg6IkhFQURmaXJzdFRpbWVTZXR1cCI7cjozNzU7czoxNzoiSEVBRGNvbXBsZXRlU2V0dXAiO3I6NDA4O3M6ODoiSEVBRGluaXQiO3I6NDQxO3M6MTg6IkhFQURnZXRTZXR1cFN0YXR1cyI7cjo0NzQ7czoxNjoiSEVBRHNhdmVDa1NlY3JldCI7cjo1MDc7czoxNDoiSEVBRHNhdmVDa1NldHQiO3I6NTQwO3M6MTM6IkhFQURzYXZlQ2tWQVQiO3I6NTczO3M6Mjc6IkhFQURzYXZlQ0tHYXRld2F5RXhjZXB0aW9ucyI7cjo2MDY7czo5OiJIRUFEdXNlcnMiO3I6NjM5O3M6MTU6IkhFQURpbnN0cnVjdGlvbiI7cjo2NzQ7czoyNToiSEVBRHtmYWxsYmFja1BsYWNlaG9sZGVyfSI7cjo3MDg7fXM6MTE6IgAqAG5hbWVMaXN0IjthOjg6e3M6MjI6InJlY2VpcHQuaW5jb21lLXdlYmhvb2siO3I6NDtzOjE0OiJyZWNlaXB0LmluY29tZSI7cjo0ODtzOjIxOiJyZWNlaXB0LmluY29tZS1yZXR1cm4iO3I6OTM7czoxMzoiYXBwLmF1dG9sb2dpbiI7cjoyMDU7czoxMzoiY3VzdG9tLmxvZ291dCI7cjoyMzk7czo0OiJob21lIjtyOjI3MztzOjU6InVzZXJzIjtyOjYzOTtzOjExOiJpbnN0cnVjdGlvbiI7cjo2NzQ7fXM6MTM6IgAqAGFjdGlvbkxpc3QiO2E6MjA6e3M6ODA6IkFwcFxIdHRwXENvbnRyb2xsZXJzXFJlY2VpcHRHZW5lcmF0b3JDb250cm9sbGVyQGdlbmVyYXRlSW5jb21lUmVjZWlwdEZyb21XZWJob29rIjtyOjQ7czo2OToiQXBwXEh0dHBcQ29udHJvbGxlcnNcUmVjZWlwdEdlbmVyYXRvckNvbnRyb2xsZXJAZ2VuZXJhdGVJbmNvbWVSZWNlaXB0IjtyOjQ4O3M6NzU6IkFwcFxIdHRwXENvbnRyb2xsZXJzXFJlY2VpcHRHZW5lcmF0b3JDb250cm9sbGVyQGdlbmVyYXRlSW5jb21lUmV0dXJuUmVjZWlwdCI7cjo5MztzOjMyOiJBcHBcSHR0cFxDb250cm9sbGVyc1xJbnN0YWxsQGdldCI7cjoxMzk7czozNDoiQXBwXEh0dHBcQ29udHJvbGxlcnNcVW5pbnN0YWxsQGdldCI7cjoxNzI7czo1NToiQXBwXEh0dHBcQ29udHJvbGxlcnNcQXV0aFxBdXRvbG9naW5Db250cm9sbGVyQGF1dG9sb2dpbiI7cjoyMDU7czo0ODoiQXBwXEh0dHBcQ29udHJvbGxlcnNcQXV0aFxMb2dpbkNvbnRyb2xsZXJAbG9nb3V0IjtyOjIzOTtzOjMzOiJBcHBcSHR0cFxDb250cm9sbGVyc1xTZXR0aW5nc0BnZXQiO3I6MjczO3M6MzU6IkFwcFxIdHRwXENvbnRyb2xsZXJzXFNldHRpbmdzQGdldEpTIjtyOjMwODtzOjM5OiJBcHBcSHR0cFxDb250cm9sbGVyc1xGaXJzdFRpbWVTZXR1cEBnZXQiO3I6MzQxO3M6NDE6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEZpcnN0VGltZVNldHVwQGdldEpTIjtyOjM3NTtzOjM5OiJBcHBcSHR0cFxDb250cm9sbGVyc1xJbml0QGNvbXBsZXRlU2V0dXAiO3I6NDA4O3M6MzA6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEluaXRAaW5pdCI7cjo0NDE7czo0MDoiQXBwXEh0dHBcQ29udHJvbGxlcnNcSW5pdEBnZXRTZXR1cFN0YXR1cyI7cjo0NzQ7czozNDoiQXBwXEh0dHBcQ29udHJvbGxlcnNcQ2tTZWNyZXRAc2F2ZSI7cjo1MDc7czozMjoiQXBwXEh0dHBcQ29udHJvbGxlcnNcQ2tTZXR0QHNhdmUiO3I6NTQwO3M6MzE6IkFwcFxIdHRwXENvbnRyb2xsZXJzXENrVkFUQHNhdmUiO3I6NTczO3M6NDU6IkFwcFxIdHRwXENvbnRyb2xsZXJzXENLR2F0ZXdheUV4Y2VwdGlvbnNAc2F2ZSI7cjo2MDY7czo0NDoiQXBwXEh0dHBcQ29udHJvbGxlcnNcVXNlcnNDb250cm9sbGVyQHNob3dBbGwiO3I6NjM5O3M6NTE6IkFwcFxIdHRwXENvbnRyb2xsZXJzXEhvbWVDb250cm9sbGVyQHNob3dJbnN0cnVjdGlvbiI7cjo3MDg7fX0='))
);