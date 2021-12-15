      <ul class="nav nav-tabs mb-5">
          <li class="nav-item">
              <a class="nav-link {{isset($active_app_view)?'active':''}}" href="{{ route('petitions.edit', $petition_id) }}">Application</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{isset($petition_documents_view)?'active':''}}" href="{{ url('petition_documents/create?petition_id='.$petition_id) }}">Application Documents</a>
          </li>
      </ul> 