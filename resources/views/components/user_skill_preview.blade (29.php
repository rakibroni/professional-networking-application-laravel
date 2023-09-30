<span id="skill_preview_{{ $userSkill->id }}"
  class="unselectable pointer-on-hover badge ProfileTextWrap TextWrapStyle"
  style="height:28px; margin-right: 20px"><span id="inner_skill_preview{{ $userSkill->id }}"> {{ $userSkill->name }} </span> <div class="delete-badge-profil"
  onclick="removeSkill($('#'+this.id).parent().attr('id'))" onmouseleave="removeDeleteAnim(this.id)"
    onmouseenter="addDeleteAnim(this.id)" id="skill_delete_preview{{ $userSkill->id }}">X</div></span>
