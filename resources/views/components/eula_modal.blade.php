<!-- Modal -->
<style>


</style>





<!-- Modal -->
<div id="eula_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Endbenutzer Lizenzvertrag</h5>


        @if (auth()->user()->eula_acceptance == 'true')
          <div class="btn-close" onclick="$('#eula_modal').modal('hide');"></div>
        @endif
      </div>
      <div class="modal-body unselectable">
        <p>Endbenutzer-Lizenzvertrag (EULA) von Curawork</p>
        <p>Dieser Endbenutzer-Lizenzvertrag (&quot;EULA&quot;) ist eine rechtliche Vereinbarung zwischen Ihnen und der
          Curawork UG (haftungsbeschr&auml;nkt). Unser EULA wurde von EULA Template for Curawork erstellt.</p>
        <p><br></p>
        <p>Diese EULA-Vereinbarung regelt Ihren Erwerb und Ihre Nutzung unserer Curawork-Software (&quot;Software&quot;)
          direkt von Curawork UG (haftungsbeschr&auml;nkt) oder indirekt &uuml;ber einen von Curawork UG
          (haftungsbeschr&auml;nkt) autorisierten Wiederverk&auml;ufer oder Distributor (ein
          &quot;Wiederverk&auml;ufer&quot;).</p>
        <p><br></p>
        <p>Bitte lesen Sie diese EULA-Vereinbarung sorgf&auml;ltig durch, bevor Sie den Installationsprozess
          abschlie&szlig;en und die Curawork-Software verwenden. Sie beinhaltet eine Lizenz zur Nutzung der Curawork
          Software und enth&auml;lt Informationen zur Gew&auml;hrleistung und Haftungsausschl&uuml;sse.</p>
        <p><br></p>
        <p>Wenn Sie sich f&uuml;r eine kostenlose Testversion der Curawork-Software registrieren, gilt diese
          EULA-Vereinbarung auch f&uuml;r diese Testversion. Indem Sie auf &quot;Akzeptieren&quot; klicken oder die
          Curawork-Software installieren und/oder benutzen, best&auml;tigen Sie, dass Sie die Software akzeptieren und
          sich mit den Bedingungen dieser EULA-Vereinbarung einverstanden erkl&auml;ren.</p>
        <p><br></p>
        <p>Wenn Sie diese EULA-Vereinbarung im Namen eines Unternehmens oder einer anderen juristischen Person
          abschlie&szlig;en, versichern Sie, dass Sie die Befugnis haben, dieses Unternehmen und seine
          Tochtergesellschaften an diese Bedingungen zu binden. Wenn Sie nicht &uuml;ber eine solche Befugnis
          verf&uuml;gen oder mit den Bedingungen dieser EULA-Vereinbarung nicht einverstanden sind, d&uuml;rfen Sie die
          Software nicht installieren oder verwenden und m&uuml;ssen diese EULA-Vereinbarung nicht akzeptieren.</p>
        <p><br></p>
        <p>Diese EULA-Vereinbarung gilt nur f&uuml;r die von der Curawork UG (haftungsbeschr&auml;nkt) hiermit
          gelieferte Software, unabh&auml;ngig davon, ob auf andere Software Bezug genommen wird oder diese hier
          beschrieben wird. Die Bedingungen gelten auch f&uuml;r alle von Curawork UG (haftungsbeschr&auml;nkt)
          gelieferten Updates, Erg&auml;nzungen, internetbasierten Dienste und Supportleistungen f&uuml;r die Software,
          es sei denn, dass diesen Gegenst&auml;nden bei der Lieferung andere Bedingungen beiliegen. Ist dies der Fall,
          gelten diese Bedingungen.</p>
        <p><br></p>
        <p>Lizenzeinr&auml;umung</p>
        <p>Die Curawork UG (haftungsbeschr&auml;nkt) gew&auml;hrt Ihnen hiermit eine pers&ouml;nliche, nicht
          &uuml;bertragbare, nicht ausschlie&szlig;liche Lizenz zur Nutzung der Curawork-Software auf Ihren Ger&auml;ten
          gem&auml;&szlig; den Bestimmungen dieser EULA-Vereinbarung.</p>
        <p><br></p>
        <p>Sie sind berechtigt, die Curawork-Software auf ein Ger&auml;t (z.B. PC, Laptop, Handy oder Tablet) zu laden,
          das sich unter Ihrer Kontrolle befindet. Sie sind daf&uuml;r verantwortlich, dass Ihr Ger&auml;t die
          Mindestanforderungen der Curawork-Software erf&uuml;llt.</p>
        <p><br></p>
        <p>Sie sind nicht berechtigt:</p>
        <p><br></p>
        <p>die Software ganz oder teilweise zu bearbeiten, zu ver&auml;ndern, zu modifizieren, anzupassen, zu
          &uuml;bersetzen oder anderweitig zu ver&auml;ndern, noch zuzulassen, dass die Software ganz oder teilweise mit
          anderer Software kombiniert oder in diese integriert wird, noch die Software zu dekompilieren, zu
          disassemblieren oder zur&uuml;ckzuentwickeln oder zu versuchen, solche Dinge zu tun</p>
        <p>die Software zu vervielf&auml;ltigen, zu kopieren, zu vertreiben, weiterzuverkaufen oder anderweitig f&uuml;r
          kommerzielle Zwecke zu nutzen</p>
        <p>Dritten zu gestatten, die Software im Namen oder zum Nutzen Dritter zu verwenden</p>
        <p>die Software in einer Weise zu verwenden, die gegen geltendes lokales, nationales oder internationales Recht
          verst&ouml;&szlig;t</p>
        <p>die Software f&uuml;r einen Zweck zu verwenden, der nach Ansicht von Curawork UG (haftungsbeschr&auml;nkt)
          einen Versto&szlig; gegen diese EULA-Vereinbarung darstellt</p>
        <p>Geistiges Eigentum und Eigentumsrechte</p>
        <p>Die Curawork UG (haftungsbeschr&auml;nkt) beh&auml;lt zu jeder Zeit das Eigentum an der Software, wie sie
          urspr&uuml;nglich von Ihnen heruntergeladen wurde, sowie an allen nachfolgenden Downloads der Software durch
          Sie. Die Software (sowie das Urheberrecht und andere geistige Eigentumsrechte jeglicher Art an der Software,
          einschlie&szlig;lich aller daran vorgenommenen &Auml;nderungen) sind und bleiben Eigentum der Curawork UG
          (haftungsbeschr&auml;nkt).</p>
        <p><br></p>
        <p>Die Curawork UG (haftungsbeschr&auml;nkt) beh&auml;lt sich das Recht vor, Lizenzen zur Nutzung der Software
          an Dritte zu vergeben.</p>
        <p><br></p>
        <p>Beendigung</p>
        <p>Diese EULA-Vereinbarung gilt ab dem Datum, an dem Sie die Software zum ersten Mal nutzen, und bleibt bis zu
          ihrer K&uuml;ndigung bestehen. Sie k&ouml;nnen ihn jederzeit durch schriftliche Mitteilung an Curawork UG
          (haftungsbeschr&auml;nkt) k&uuml;ndigen.</p>
        <p><br></p>
        <p>Sie endet auch sofort, wenn Sie eine der Bedingungen dieser EULA-Vereinbarung nicht einhalten. Bei einer
          solchen Beendigung enden die durch diese EULA-Vereinbarung gew&auml;hrten Lizenzen sofort und Sie verpflichten
          sich, jeglichen Zugriff auf die Software und deren Nutzung einzustellen. Die Bestimmungen, die ihrer Natur
          nach fortbestehen und &uuml;berleben, &uuml;berdauern jede Beendigung dieser EULA-Vereinbarung.</p>
        <p><br></p>
        <p>Geltendes Recht</p>
        <p>Diese EULA-Vereinbarung und alle Streitigkeiten, die sich aus oder in Verbindung mit dieser EULA-Vereinbarung
          ergeben, unterliegen den Gesetzen von Deutschland und werden in &Uuml;bereinstimmung mit diesen ausgelegt.</p>
        <p><br></p>
        <p>Alle visuellen Inhalte, die auf der Website gepostet oder anderweitig eingereicht werden, sowie alle
          Kommentare oder andere Mitteilungen (&quot;Mitteilungen&quot;, wobei visuelle Inhalte und Mitteilungen
          zusammen als &quot;Inhalt&quot; bezeichnet werden) unterliegen der alleinigen Verantwortung des Kontoinhabers,
          von dem diese Mitteilungen stammen. Sie erkennen an und stimmen zu, dass Sie und nicht Curawork UG
          (haftungsbeschränkt) die volle
          Verantwortung f&uuml;r alle Inhalte tragen, die Sie auf der Website ver&ouml;ffentlichen oder anderweitig an
          die Website &uuml;bermitteln, einschlie&szlig;lich der &uuml;ber den Messenger-Dienst von Curawork UG
          (haftungsbeschränkt) ausgetauschten
          Nachrichten. Curawork UG (haftungsbeschränkt) hat keine Kontrolle &uuml;ber die vom Benutzer eingereichten
          Inhalte und garantiert daher
          nicht f&uuml;r die Richtigkeit, Integrit&auml;t oder Qualit&auml;t dieser Inhalte. Sie nehmen zur Kenntnis,
          dass Sie durch die Nutzung der Website Inhalten ausgesetzt sein k&ouml;nnen, die anst&ouml;&szlig;ig,
          unanst&auml;ndig oder verwerflich sind.</p>
        <p><br></p>
        <p><br></p>
        <p>Als Bedingung f&uuml;r die Nutzung versprechen Sie, sich an unsere Inhaltsrichtlinien zu halten und die
          Dienste nicht f&uuml;r einen Zweck zu nutzen, der ungesetzlich oder durch diese Bedingungen verboten ist, oder
          f&uuml;r einen anderen Zweck, der von Curawork UG (haftungsbeschränkt) nicht vern&uuml;nftigerweise
          beabsichtigt ist. Als Beispiel, und
          nicht als Einschr&auml;nkung, erkl&auml;ren Sie sich damit einverstanden, die Dienste nicht zu nutzen</p>
        <p><br></p>
        <p><br></p>
        <p>1) Eine Person zu missbrauchen, zu bel&auml;stigen, zu bedrohen, sich als solche auszugeben oder
          einzusch&uuml;chtern;</p>
        <p><br></p>
        <p><br></p>
        <p>2) Inhalte, die verleumderisch, diffamierend, obsz&ouml;n, pornografisch, beleidigend, anst&ouml;&szlig;ig
          oder gottesl&auml;sterlich sind oder die das Urheberrecht oder andere Rechte einer Person verletzen, zu
          ver&ouml;ffentlichen oder zu &uuml;bertragen oder dies zu veranlassen;</p>
        <p><br></p>
        <p><br></p>
        <p>3) Mit Curawork UG (haftungsbeschränkt)-Vertretern oder anderen Nutzern in einer beleidigenden oder
          anst&ouml;&szlig;igen Weise zu
          kommunizieren;</p>
        <p><br></p>
        <p><br></p>
        <p>4) F&uuml;r jeden Zweck (einschlie&szlig;lich der Ver&ouml;ffentlichung oder Ansicht von Inhalten), der nach
          den Gesetzen des Landes, in dem Sie die Dienste nutzen, nicht zul&auml;ssig ist;</p>
        <p><br></p>
        <p><br></p>
        <p>5) Mitteilungen zu posten oder zu &uuml;bertragen oder zu veranlassen, dass diese gepostet oder
          &uuml;bertragen werden, die darauf abzielen, Passw&ouml;rter, Konten oder private Informationen von
          Curawork UG (haftungsbeschränkt)-Benutzern zu erhalten;</p>
        <p><br></p>
        <p><br></p>
        <p>6) Das Erstellen oder &Uuml;bertragen von unerw&uuml;nschtem &quot;Spam&quot; an eine Person oder eine URL;
        </p>
        <p><br></p>
        <p><br></p>
        <p>7) Das Anlegen mehrerer Konten zum Zweck der Abstimmung &uuml;ber visuelle Inhalte von Benutzern;</p>
        <p><br></p>
        <p><br></p>
        <p>8) urheberrechtlich gesch&uuml;tzte Inhalte zu ver&ouml;ffentlichen, die Ihnen nicht geh&ouml;ren, es sei
          denn, Sie kommentieren visuelle Inhalte in Blogs, wo Sie solche Inhalte ver&ouml;ffentlichen k&ouml;nnen,
          sofern Sie den Urheberrechtsinhaber angemessen nennen und einen Link zur Quelle des Inhalts angeben;</p>
        <p><br></p>
        <p><br></p>
        <p>9) Mit Ausnahme des Zugriffs auf RSS-Feeds verpflichten Sie sich, ohne unsere ausdr&uuml;ckliche schriftliche
          Genehmigung keine Roboter, Spider, Scraper oder andere automatisierte Mittel f&uuml;r den Zugriff auf die
          Website zu verwenden. Dar&uuml;ber hinaus stimmen Sie zu, dass Sie nicht: (i) keine Ma&szlig;nahmen zu
          ergreifen, die nach unserem alleinigen Ermessen eine unangemessene oder unverh&auml;ltnism&auml;&szlig;ig
          gro&szlig;e Belastung unserer Infrastruktur darstellen oder darstellen k&ouml;nnen; (ii) den
          ordnungsgem&auml;&szlig;en Betrieb der Website oder die auf der Website durchgef&uuml;hrten Aktivit&auml;ten
          zu st&ouml;ren oder zu versuchen, diese zu st&ouml;ren; oder (iii) Ma&szlig;nahmen zu umgehen, die wir zur
          Verhinderung oder Einschr&auml;nkung des Zugriffs auf die Website einsetzen;</p>
        <p><br></p>
        <p><br></p>
        <p>10) die Ausz&auml;hlung von Stimmen, Blogs, Kommentaren oder anderen Diensten k&uuml;nstlich zu inﬂizieren
          oder zu ver&auml;ndern, oder um Geld oder andere Entsch&auml;digungen im Austausch f&uuml;r Stimmen zu geben
          oder zu erhalten und/oder um zu versuchen, das Ergebnis von Wettbewerben oder Werbeaktionen zu ver&auml;ndern,
          oder um an anderen organisierten Bem&uuml;hungen teilzunehmen, die in irgendeiner Weise die Ergebnisse von
          Diensten k&uuml;nstlich ver&auml;ndern;</p>
        <p><br></p>
        <p><br></p>
        <p>11) Werbung oder Aufforderung an Nutzer, Produkte oder Dienstleistungen Dritter zu kaufen oder zu verkaufen,
          oder Verwendung von Informationen, die von den Diensten erhalten wurden, um Nutzer ohne deren vorherige
          ausdr&uuml;ckliche Zustimmung zu kontaktieren, zu werben, aufzufordern oder zu verkaufen;</p>
        <p><br></p>
        <p><br></p>
        <p>12) Visuelle Inhalte einer anderen Person zu bewerben oder zu verkaufen, es sei denn, Sie sind
          ausdr&uuml;cklich dazu befugt; oder</p>
        <p><br></p>
        <p><br></p>
        <p>13) Ihr Profil oder Konto zu verkaufen, abzutreten oder anderweitig zu &uuml;bertragen.</p>
        <p><br></p>
        <p><br></p>
        <p>Um einen mutma&szlig;lichen Missbrauch der Website oder einen Versto&szlig; gegen die Bedingungen zu melden
          (mit Ausnahme von Urheberrechtsverletzungen, die unter &quot;COPYRIGHT COMPLAINTS&quot; unten behandelt
          werden), senden Sie bitte eine schriftliche Mitteilung an Curawork UG (haftungsbeschränkt) unter der
          E-Mail-Adresse info@curawork.online</p>
        <p><br></p>
        <p><br></p>
        <p>Sie sind allein verantwortlich f&uuml;r Ihre Interaktionen mit anderen Nutzern der Website. Curawork UG
          (haftungsbeschränkt) beh&auml;lt
          sich das Recht vor, ist aber nicht verpflichtet, Streitigkeiten zwischen Ihnen und anderen Nutzern zu
          pr&uuml;fen. Dies schlie&szlig;t das Recht ein, Nachrichten, die &uuml;ber den Messenger-Dienst von Curawork
          UG (haftungsbeschränkt)
          ausgetauscht werden, auf der Grundlage von Berichten zu &uuml;berpr&uuml;fen, die Curawork UG
          (haftungsbeschränkt) erh&auml;lt und in
          denen die Verletzung dieser Bedingungen durch die Nutzung des Messenger-Dienstes von Curawork UG
          (haftungsbeschränkt) behauptet wird,
          einschlie&szlig;lich, aber nicht beschr&auml;nkt auf Berichte &uuml;ber angebliche Bel&auml;stigung,
          Unanst&auml;ndigkeit und beleidigende Nachrichten.</p>
        <p><br></p>
        <p><br></p>
        <p>Wenn die Dienste oder die Website in einer Weise genutzt werden, die in irgendeiner Weise gegen die
          Bedingungen verst&ouml;&szlig;t, kann Curawork UG (haftungsbeschränkt) nach eigenem Ermessen, ist aber nicht
          dazu verpflichtet, Ihr Konto
          auszusetzen oder zu k&uuml;ndigen, Ihren Zugang zur Website zu sperren und/oder alle Schritte zu unternehmen,
          die es f&uuml;r angemessen h&auml;lt, um die Situation anzugehen.</p>
      </div>
      @if (auth()->user()->eula_acceptance == 'false')
        <div class="modal-footer">
          <button type="button" onclick="acceptEULA()" class="btn btn-warning cura-bg">Akzeptieren</button>
        </div>
      @endif
    </div>
  </div>
</div>



<script>
  document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
      setTimeout(() => {
        var eula_acceptance = '{{ auth()->user()->eula_acceptance }}';
        var username = '{{ auth()->user()->username }}';

        if (eula_acceptance == 'false') {
          $('#eula_modal').modal('show');
        }
      }, 1000);

    }
  };



  function acceptEULA() {
    $('#eula_modal').modal('hide');

    var form = new FormData;
    var username = '{{ auth()->user()->username }}';
    console.log()
    form.append('username', username);
    var functionsOnSuccess = [];
    ajax('/update_eula', 'POST', functionsOnSuccess, form)
  }
</script>
