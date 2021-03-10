

<h1> {{$contact->name}} tarafından yeni bir mesaj gönderildi</h1>
<ul>
    <li>Kullancının adı : {{$contact->name}}</li>
    <li>Kullancının email : {{$contact->email}}</li>
    <li>Mail Konusu:{{$contact->subject}}</li>
    <li>Mail İçeriği:{{$contact->message}}</li>

</ul>

