<?php

namespace Domain\Status;

enum InvoiceStatus: int
{
    case  PENDING = 1;
    case  DONE = 2;
}