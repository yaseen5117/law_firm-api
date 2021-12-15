      <ul class="nav nav-tabs mb-5">
          <li class="nav-item">
              <a class="nav-link {{isset($active_app_view)?'active':''}}" href="{{ route('petitions.edit', $id) }}">Application</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{isset($petition_documents_view)?'active':''}}" href="{{ route('petition_documents.create') }}">Application Documents</a>
          </li>
      </ul> 