<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="{{url('/')}}">
        <svg>
            <use xlink:href="#ion-ios-pulse-strong"></use>
        </svg>
        Spark
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="img/avatars/avatar-2.jpg" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />
            <div class="fw-bold">Guido Calderón Salvatierra</div>
            <small>Administrador de Bienes Raíces</small>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item active">
                <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-user"></i> <span class="align-middle">Menús</span>
                </a>
                <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                    <li class="sidebar-item active"><a class="sidebar-link" href="{{url('tipo_usuario')}}">Tipos de Usuario</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{url('tipo_especialidad')}}">Especialidad</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{url('tipo_registropersona')}}">Registro de Persona</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>