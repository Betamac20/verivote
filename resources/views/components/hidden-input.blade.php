<input type="text" value="{{ Auth::user()->id_number }}" name="id_number">
<input type="hidden" value="{{ Auth::user()->name }}" name="name">
<input type="hidden" value="{{ $candidate->position }}" name="position">
<input type="hidden" value="{{ $candidate->name }}" name="candidate_name">
<input type="hidden" value="{{ $candidate->id_number }}" name="candidate_id_number">
<input type="hidden" value="{{ $candidate->election_id }}" name="election_id">
<input type="hidden" value="{{ $candidate->department }}" name="department">
<input type="hidden" value="{{ $candidate->candidate_role }}" name="candidate_role">